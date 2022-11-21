<!DOCTYPE html>
<html lang="en">
<!--
        Kejah Pulman
        30034444

        Rhys Gillham
        M133320

        This is the template for the display of all artists  or a set of artists filtered via their style or medium
-->
<?php
include_once(dirname(__DIR__) . '/shared/navbar.php');
include_once(dirname(__DIR__) . '/script/connection.php');
include_once(dirname(__DIR__) . '/pages/ArtistFiltered.php');

$task = "noTask";
if (isset($_GET['artStyles']))
{
    $artStyle = $_GET['artStyles'];
    $sqlImages = "SELECT artistID, artistName, imageFile, style, lifeSpan FROM artists WHERE style = '$artStyle'";

    $header = $artStyle;
    $stmtImages = $conn->prepare($sqlImages);
    $stmtImages->execute();
}
else if (isset($_GET['artLife']))
{
    $artLife = $_GET['artLife'];
    $sqlImages = "SELECT artistID, artistName, imageFile, style, lifeSpan FROM artists WHERE lifeSpan = '$artLife'";

    $header = $artLife;
    $stmtImages = $conn->prepare($sqlImages);
    $stmtImages->execute();
}
else
{
    $sqlImages = "SELECT artistID, artists.artistName, artists.imageFile, artists.style, artists.lifeSpan FROM artists ORDER BY artists.artistName";
    $header = 'Artists';
}

if (isset($_GET['task']))
{
    $task = $_GET['task'];
}

include_once(dirname(__DIR__) . '/shared/head.php');
?>

<body>
    <main class="mainContentAlignment">
        <?php
        echo '<h1>' . $header . '</h1>';
        ?>

        <div>
            <a class="btn btn-primary" method="post" href="ArtistFiltered.php?task=create">
                Add Artist
            </a>
        </div>

        <table class="table">
            <thead>

                <tr>
                    <th scope="col">Artist</th>
                    <th scope="col">Self Portrait</th>
                    <th scope="col">Style</th>
                    <th scope="col">Life Span</th>
                </tr>
            </thead>
            <?php
            if ($task == "delete")
            {
                sql_commands::Delete($_GET['deleteId'], "artists", $conn);
            }

            $stmtImages = $conn->prepare($sqlImages);
            $stmtImages->execute();
            while ($row = $stmtImages->fetch())
            {
                echo "<tr>";
                echo "<td scope = \"row\">" . $row['artistName'] . "</td>";
                echo "<td scope = \"row\">" . '<img alt="An image of '.$row['artistName'].'" src = "data:image/png;base64,' . base64_encode($row['imageFile']) . '" width = 300px" . "height = 300px"/>' . "</td>";
                echo "<td scope = \"row\">" . $row['style'] . "</td>";
                echo "<td scope = \"row\">" . $row['lifeSpan'] . "</td>";
                echo '<td> <a class=\'btn btn-primary\' method="post" href="ArtistFiltered.php?id=' . $row['artistID'] . '">Go To</a>';
                echo '<td> <a class=\'btn btn-primary\' method="post" href="ArtistTable.php?task=delete&deleteId=' . $row['artistID'] . '">Delete</a>';
                echo "</tr>";
            }


            ?>
        </table>
    </main>