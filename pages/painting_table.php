<!DOCTYPE html>
<html lang="en">
<!--
        Rhys Gillham
        M133320

        Kejah Pulman 
        30034444
        
        This is the template for the display of all or if given a style or artist only those matching the parameter.
-->

<?php
    $sqlImages = "SELECT paintings.id, paintings.name, paintings.imageFile, paintings.year, paintings.medium, paintings.style, artists.artistName 
    FROM paintings JOIN artists ON paintings.artistID = artists.artistID ORDER BY paintings.name";
    echo "<script>console.log(\"".$sqlImages."\");</script>";

    $header = 'Browse';
    $task = 'displayAll';
    
    if (isset($_GET['style']))
    {
        $painting_style = $_GET['style'];
        
        $sqlImages = "SELECT paintings.id, paintings.name, paintings.imageFile, paintings.year, paintings.medium, paintings.style, artists.artistName 
        FROM paintings JOIN artists ON paintings.artistID = artists.artistID WHERE paintings.style = '$painting_style' ORDER BY paintings.name";
        
        $header = $painting_style;
    }
    elseif (isset($_GET['artist']))
    {
        $painting_artist = $_GET['artist'];
        
        $sqlImages = "SELECT paintings.id, paintings.name, paintings.imageFile, paintings.year, paintings.medium, paintings.style, artists.artistName 
        FROM paintings JOIN artists ON paintings.artistID = artists.artistID WHERE artists.artistName = '$painting_artist' ORDER BY paintings.name";

        $header = $painting_artist;
    }
elseif (isset($_GET['task']))
{
    $task = 'delete';
}

include_once(dirname(__DIR__) . '/shared/head.php');
?>

<body>
    <?php include_once(dirname(__DIR__) . '/shared/navbar.php'); ?>
    <main class="mainContentAlignment">
        <?php
        echo '<h1>' . $header . '</h1>';
        ?>
        <div>
            <a class="btn btn-primary" method="post" href="painting_filtered.php?task=create">
                Add New
            </a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Year</th>
                    <th scope="col">Artist</th>
                    <th scope="col">Medium</th>
                    <th scope="col">Style</th>
                </tr>
            </thead>
            <?php
            if ($task == 'delete')
            {
                sql_commands::Delete($_GET['deleteId'], "paintings", $conn);
            }

            $stmtImages = $conn->prepare($sqlImages);
            $stmtImages->execute();

            while ($row = $stmtImages->fetch(PDO::FETCH_BOTH))
            {
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
                echo '<td> <a class=\'btn btn-primary\' method="post" href="painting_table.php?task=delete&deleteId=' . $a->id . '">DELETE</a>';
                echo '</tr>';
            }
            ?>
        </table>
    </main>


</body>

</html>