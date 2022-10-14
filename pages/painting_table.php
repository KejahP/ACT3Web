<!DOCTYPE html>
<html lang="en">
<!--
        Rhys Gillham
        M133320
        This is the template for the display of all or if given a style or artist only those matching the parameter.
-->
<?php
$sqlImages = "SELECT * FROM paintings";
$header = 'Browse';
if (isset($_GET['style'])) {
    $painting_style = $_GET['style'];
    $sqlImages = "SELECT * FROM paintings WHERE style = '$painting_style'";
    $header = $painting_style;
} elseif (isset($_GET['artist'])) {
    $painting_artist = $_GET['artist'];
    $sqlImages = "SELECT * FROM paintings WHERE artist = '$painting_artist'";
    $header = $painting_artist;
}
include_once(dirname(__DIR__) . '/shared/head.php');
?>

<body>
    <?php include_once(dirname(__DIR__) . '/shared/navbar.php'); ?>
    <main class="mainContentAlignment">
        <?php
        echo '<h1>' . $header . '</h1>';
        ?>
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

            $stmtImages = $conn->prepare($sqlImages);
            $stmtImages->execute();

            while ($row = $stmtImages->fetch(PDO::FETCH_BOTH)) {
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
                echo '</a>';
                echo '</tr>';
            }
            ?>
        </table>
    </main>


</body>

</html>