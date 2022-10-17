<!DOCTYPE html>
<html lang="en">
<!--
        Rhys Gillham
        M133320
        This is the template for the display of a painting, it contains the page an error message if the item could not be located within the database.
-->
<?php
$pageNotLoaded = true;
$title = "";
$multiplePaintings = true;

if (isset($_GET['id'])) { //Determines if there is an id value and sets the query variable
    $painting_id = $_GET['id'];
    $multiplePaintings = false;
    $sqlImages = "SELECT * FROM paintings WHERE id = $painting_id";
} else if (isset($_POST['search'])) { //Determines if there was a posted search value and sets the query variable
    $sqlImages = "SELECT * FROM paintings WHERE name= '" . $_POST['search'] . "'";
    $title = "Results for " . $_POST['search'];
}
include_once(dirname(__DIR__) . '/shared/head.php');
?>

<body>
    <?php include_once(dirname(__DIR__) . '/shared/navbar.php'); ?>
    <main class="mainContentAlignment">
        <?php
        echo '<h1>' . $title . '</h1>';

            $stmtImages = $conn->prepare($sqlImages);
            $stmtImages->execute();

            while ($row = $stmtImages->fetch(PDO::FETCH_BOTH)) {
                if ($row != null) {
                    $pageNotLoaded = false;
                    $a = painting::FromRow($row);
                    
                    
                    if ($multiplePaintings) 
                    { //Will place a clickable button that goes to that image directly if there could be multiple items on the page.
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
                        echo "</table>";
                    }     
                    else
                    {
                        $a->FormGroup();
                    }                  
                }
            }
            
            if ($pageNotLoaded) {
                echo "<div class='row text-center'><h2>Painting not found</h2></div>";
            }
            ?>
    </main>
</body>

</html>