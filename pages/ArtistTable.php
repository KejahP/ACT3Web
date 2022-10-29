<!DOCTYPE html>
<html lang="en">
<!--
        Kejah Pulman
        30034444

        This is the template for the display of all artists  or a set of artists filtered via their style or medium
-->
<?php
include_once(dirname(__DIR__) . '/shared/navbar.php'); 
include_once(dirname(__DIR__) . '/script/connection.php');
?>

<body>
    	<?php
            include_once(dirname(__DIR__) . '/shared/head.php');

            $sqlImages = "SELECT artistName, imageFile, style, lifeSpan FROM artists"; 

            echo "<script>console.log(\"".$sqlImages."\");</script>";
            
            $header = 'Browse';
            echo "<h1>" . $header . "</h1>";

            $task = 'displayAll';
        ?>
        

        <div>
            <a class="btn btn-primary" method="post" href="//ArtistFiltered.php?task=create\\">
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

            
                $stmtImages = $conn->prepare($sqlImages);
                $stmtImages->execute();

                while ($row = $stmtImages->fetch())
                {
                    echo "<tr>";
                    echo "<td scope = \"row\">" . $row['artistName'] . "</td>";
                    echo "<td scope = \"row\">" . '<img src = "data:image/png;base64,' . base64_encode($row['imageFile']) . '" width = 300px" . "height = 300px"/>'. "</td>";
                    echo "<td scope = \"row\">" . $row['style'] . "</td>";
                    echo "<td scope = \"row\">" . $row['lifeSpan'] . "</td>";
                    echo "</tr>";
                }
            ?>
</table>