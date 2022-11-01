<!DOCTYPE html>
<html lang="en">

<!--
        Kejah Pulman
        30034444
        
        This is the template for the display of an artist
-->

<?php
include_once(dirname(__DIR__) . '/shared/head.php');
include_once(dirname(__DIR__) . '/shared/navbar.php');
include_once(dirname(__DIR__) . '/script/ArtistModel.php');

$task;
set1
set2
set3

if (isset($_GET['id']))
{
        $ID = $_GET['id'];
        $multi = false;
        $sqlImages = "SELECT artistID, artistName, imageFile, style, lifeSpan FROM artists WHERE artistID = '$ID'";

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
elseif (isset($search) $task == "")
{
}
elseif(isset(create)){

}
elseif(isset(singleGet))

?>