<?php
$sqlImages = "SELECT * FROM paintings";
$header = 'Browse';
if (isset($_GET['style'])) {
    $painting_style = $_GET['style'];
    $sqlImages = "SELECT * FROM paintings WHERE style = '$painting_style'";
    $header = 'Style';
} elseif (isset($_GET['artist'])) {
    $painting_artist = $_GET['artist'];
    $sqlImages = "SELECT * FROM paintings WHERE artist = '$painting_artist'";
    $header = 'Artist';
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
include_once(dirname(__DIR__).'/script/painting_model.php');
include_once(dirname(__DIR__) . '/shared/head.php');
?>

<body>
    <?php include_once(dirname(__DIR__) . '/shared/navbar.php'); ?>
    <main class="mainContentAlignment outline">
        <?php
        echo '<h1>'.$header.'</h1>';
        ?>

        <div class="container text-center">
            <p>
                Manager: Kejah Pulman (30034444)
            </p>
            <p>
            <ul> Programmers:
                <li>Rhys Gillham (M133320)</li>
                <li>Andrew Masar (P271838) </li>
            </ul>
            </p>
        </div>
    </main>

    <div class="container-fluid">
        <table class="table mainContentAlignment">
            <thead>
                <tr>
                    <th scope="col">ID</th>
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
                #echo sprintf('<a method="post" href="template_single.php?id=%d">', $a->id);  
                echo '<td><a method="post" href="template_single.php?id=' . $a->id . '"> ' . $a->id . ' </a></td>';
                echo '<td>' .  $a->name . '</td>';
                echo '<td>' .
                    $a->createImage("300px", "300px")
                    . '</td>';
                echo '<td>' . $a->year . ' </td>';
                echo '<td>' . $a->artist . ' </td>';
                echo '<td>' . $a->medium . ' </td>';
                echo '<td>' . $a->style . ' </td>';
                echo '<td> <a class=\'btn btn-primary\' method="post" href="template_single.php?id=' . $a->id . '">Go To</a>';
                echo '</a>';
                echo '</tr>';
            }
            ?>
</body>

</html>