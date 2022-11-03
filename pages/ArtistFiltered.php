<!DOCTYPE html>
<html lang="en">

<!--
        Kejah Pulman
        30034444

        Rhys Gillham
        M133320
        
        This is the template for the display of an artist
-->

<?php
include_once(dirname(__DIR__) . '/shared/head.php');
include_once(dirname(__DIR__) . '/shared/navbar.php');
include_once(dirname(__DIR__) . '/script/ArtistModel.php');

$search = "noSearch";
$task = "noTask";

if (isset($_GET['task']))
{
        $task = $_GET['task'];
}
if (isset($_POST['search']))
{
        $search = $_POST['search'];
        $task = "search";
        echo '<script>console.log("' . $search . '");</script>';
        $sqlImages = "SELECT * FROM artists WHERE artistName LIKE '%" . $search . "%' ORDER BY artistName";
        $task = 'search';
        $title = "Results for " . $_POST['search'];
}
if (isset($_GET['id']))
{
        //This is where update lives.
        $ID = $_GET['id'];
        $sqlImages = "SELECT artistID, artistName, imageFile, style, lifeSpan FROM artists WHERE artistID = '$ID'";

        $stmtImages = $conn->prepare($sqlImages);
        $stmtImages->execute();

        echo "
                <body>
                        <main class='mainContentAlignment'>";



        while ($row = $stmtImages->fetch(PDO::FETCH_BOTH))
        {
                if ($row != null)
                {
                        $a = artist::ArtRow($row);
                        $a->EditArtist();
                }
        }
        echo "        
        </main>
                </body>";
}
elseif ($task == "search")
{
        $stmtImages = $conn->prepare($sqlImages);
        $stmtImages->execute();

        echo '<main class="mainContentAlignment">';
        echo "
                <table class='table'> 
                <thead>
                <tr>
                    <th scope=\"col\">Name</th>
                    <th scope=\"col\">Image</th>
                    <th scope=\"col\">Style</th>
                    <th scope=\"col\">Life Span</th>
                </tr>
                </thead>";
        while ($row = $stmtImages->fetch())
        {
                echo '<tr>';
                echo "<td scope = \"row\">" . $row['artistName'];
                echo "</td>";
                echo "<td scope = \"row\">" . '<img src = "data:image/png;base64,' . base64_encode($row['imageFile']) . '" width = 450px" . "height = 450px"/>' . "</td>";
                echo "<td scope = \"row\">" . $row['style'] . "</td>";
                echo "<td scope = \"row\">" . $row['lifeSpan'] . "</td>";
                echo '</tr>';
        }
        echo "</table>";
        echo '</main>';
}

elseif ($task == "create")
{
        echo '<main class="mainContentAlignment">';
        artist::CreateArtist();

        echo '</main>';
}

?>