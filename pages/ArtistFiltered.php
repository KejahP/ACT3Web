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

        if(isset($_GET['id']))
        {
                $ID = $_GET['id'];
                $multi = false;
                $sqlImages = "SELECT * FROM artists WHERE id = $ID";
                $sqlImages = "SELECT artistID, artistName, imageFile, style, lifeSpan FROM artists WHERE 'artistID' = '$ID'";

                $stmtImages = $conn->prepare($sqlImages);
                $stmtImages->execute();
                 
                echo "<script>console.log(\"".$sqlImages."\");</script>"; 

                while ($row = $stmtImages->fetch())
                {
                        echo "<script>console.log(\"".$row."\");</script>"; 
                        echo "<tr scope = \"row\">" . $row['artistName'] . "</tr>";
                        echo "<tr scope = \"row\">" . '<img src = "data:image/png;base64,' . base64_encode($row['imageFile']) . '" width = 600px" . "height = 600px"/>'. "</tr>";
                        echo "<tr scope = \"row\">" . $row['style'] . "</tr>";
                        echo "<tr scope = \"row\">" . $row['lifeSpan'] . "</tr>";
                }

        }
?>