<!DOCTYPE html>
<html lang="en">

<?php
$itsfucked = true;

if (isset($_GET['id'])) {
    $painting_id = $_GET['id'];
    $sqlImages = "SELECT * FROM paintings WHERE id = $painting_id";
} else if (isset($_POST['search'])) {
    $sqlImages = "SELECT * FROM paintings WHERE name= '" . $_POST['search'] . "'";
} 
?>

<?php
include_once(dirname(__DIR__) . '/shared/head.php');
?>

<body>
    <?php include_once(dirname(__DIR__) . '/shared/navbar.php'); ?>
    <main class="mainContentAlignment outline">
        <h1>Single Page</h1>
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

    <table class="table mainContentAlignment">
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


        include_once(dirname(__DIR__) . '/script/temp_connection.php');        //Currently set to connect to xampp using a copy of Andrews initial ConnectionHome.php in resources.
        include_once(dirname(__DIR__) . '/script/painting_model.php');

        //	IMAGES TABLE
        //$sqlImages = "SELECT * FROM paintings WHERE id = $painting_id";
        $stmtImages = $conn->prepare($sqlImages);
        $stmtImages->execute();

        while ($row = $stmtImages->fetch(PDO::FETCH_BOTH)) {
            if ($row != null) {
                $itsfucked = false;
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
                echo '<td> <a class=\'btn btn-primary\' method="post" href="template_single.php?id=' . $a->id . '">Go To</a>';
                echo '</a>';
                echo '</tr>';
            }
        }
        echo "</table>";

        if ($itsfucked) {
            echo "<div class='container-fluid outline'><h1>Painting not found</h1></div>";
        }
        ?>
</body>

</html>