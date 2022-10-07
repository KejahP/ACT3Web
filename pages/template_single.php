<?php
if (isset($_GET['id'])) {
    $painting_id = $_GET['id'];
}
?>
<!DOCTYPE html>
<html lang="en">

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
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Year</th>
                <th scope="col">Artist</th>
                <th scope="col">Medium</th>
                <th scope="col">Style</th>
            </tr>
        </thead>
        <?php
        include_once(dirname(__DIR__) . '/script/temp_connection.php');        //Currently set to connect to xampp using a copy of Andrews initial ConnectionHome.php in resources.

        //	IMAGES TABLE
        $sqlImages = "SELECT * FROM paintings WHERE id = $painting_id";
        $stmtImages = $conn->prepare($sqlImages);
        $stmtImages->execute();

        while ($row = $stmtImages->fetch(PDO::FETCH_BOTH)) {

            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' .
                '<img src = "data:image/png;base64,' . base64_encode($row['imagefile']) . '" width = "300px" height = "300px"/>'
                . '</td>';
            echo '<td>' . $row['year'] . ' </td>';
            echo '<td>' . $row['artist'] . ' </td>';
            echo '<td>' . $row['medium'] . ' </td>';
            echo '<td>' . $row['style'] . ' </td>';
            echo '</tr>';
        }
        ?>
</body>

</html>