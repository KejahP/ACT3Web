<!DOCTYPE html>
<html lang="en">
<!--
        Andrew Masar
        P271838

        Rhys Gillham
        M133320
        
        This is the template for the display of a painting, it contains the page an error message if the item could not be located within the database.
-->

<?php
$pageNotLoaded = true;
$title = "";
$multiplePaintings = true;
$task = 'noTask';

if (isset($_GET['id']))
{ //Determines if there is an id value and sets the query variable
    $painting_id = $_GET['id'];
    $multiplePaintings = false;
    $task = 'singleGet';
    $sqlImages = "SELECT * FROM paintings WHERE id = $painting_id";
    $sqlImages = "SELECT paintings.id, paintings.name, paintings.imageFile, paintings.year, paintings.medium, paintings.style, artists.artistName 
    FROM paintings JOIN artists ON paintings.artistID = artists.artistID WHERE paintings.id = $painting_id ORDER BY paintings.name";
}
else if (isset($_POST['search']))
{
    $search = $_POST['search'];
    $task = "search";
    echo '<script>console.log("' . $search . '");</script>';
    $sqlImages = "SELECT paintings.id, paintings.name, paintings.imageFile, paintings.year, paintings.medium, paintings.style, artists.artistName 
    FROM paintings JOIN artists ON paintings.artistID = artists.artistID WHERE paintings.name LIKE '%" . $search . "%' ORDER BY paintings.name";
    $task = 'search';
    $title = "Results for " . $_POST['search'];
}
else if (isset($_GET['task']))
{
    $task = $_GET['task'];
    $title = "Create New";
}
include_once(dirname(__DIR__) . '/shared/head.php');
?>

<body>
    <?php include_once(dirname(__DIR__) . '/shared/navbar.php'); ?>
    <main class="mainContentAlignment">
        <?php
        echo '<h1>' . $title . '</h1>';

        //Creates a new painting into the database.
        if ($task == 'create')
        {
            painting::CreateNew();
        }
        else if ($task == 'singleGet') //When the 'go to' button is pressed it will populate an update page.
        {

            $stmtImages = $conn->prepare($sqlImages);
            $stmtImages->execute();

            while ($row = $stmtImages->fetch(PDO::FETCH_BOTH))
            {
                if ($row != null)
                {
                    $pageNotLoaded = false;
                    $a = painting::FromRow($row);
                    $a->FormGroup($conn);
                }
            }
        }
        else if ($task == 'search') //When a search is performed 
        {
            $stmtImages = $conn->prepare($sqlImages);
            $stmtImages->execute();

            echo "
                        <table class='table'> 
                        <thead>
                        <tr>
                            <th scope=\"col\">Name</th>
                            <th scope=\"col\">Image</th>
                            <th scope=\"col\">Year</th>
                            <th scope=\"col\">Artist</th>
                            <th scope=\"col\">Medium</th>
                            <th scope=\"col\">Style</th>
                        </tr>
                        </thead>";
            while ($row = $stmtImages->fetch(PDO::FETCH_BOTH))
            {
                if ($row != null)
                {
                    $pageNotLoaded = false;
                    $a = painting::FromRow($row);

                        echo '<tr>';
                        echo '<td>' .  $a->name . '</td>';
                        echo '<td>' .
                            $a->createImage("300px", "300px")
                            . '</td>';
                        echo '<td>' . $a->year . ' </td>';
                        echo '<td>' . $a->artist . ' </td>';
                        echo '<td>' . $a->medium . ' </td>';
                        echo '<td>' . $a->style . ' </td>';
                        echo '<td> <a class=\'btn btn-primary\' method="post" href="painting_filtered.php?id=' . $a->id . '">Go To</a>';
                        echo '</tr>';
                }
            }
            echo "</table>";
        }
        else
        {
            echo "<div class='row text-center'><h2>Painting not found</h2></div>";
        }
        ?>
    </main>
</body>

</html>