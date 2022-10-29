<!DOCTYPE html>
<html lang="en">
<!--
        Kejah Pulman
        30034444

        This is the template for the display of all artists  or a set of artists filtered via their style or medium
-->
<?php
include_once(dirname(__DIR__) . '/shared/navbar.php'); 
?>

<body>
    	<?php
            include_once(dirname(__DIR__) . '/shared/head.php');

            $sqlImages = "SELECT artistName, imageFile, style, 'life Span' FROM artists"; 

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
                    <th scope="col">'Life Span'</th>
                </tr>
            </thead>

            
            <?php

            
                $stmtImages = $conn->prepare($sqlImages);
                $stmtImages->execute();
            
                while ($row = $stmtImages->setFetchMode(PDO::FETCH_BOTH))
                {
                    $a = artist::NewRow($row);

                    echo '<tr>';
                    echo '<td>' .  $a->artistName . '</td>';
                    echo '<td>' .$a->imageFile. '</td>';
                    echo '<td>' . $a->style . ' </td>';
                    echo '<td>' . $a->lifeSpan . ' </td>';
                
                    echo '<td> <a class=\'btn btn-primary\' method="post" href="ArtistFiltered.php?id=' . $a->id . '">Go To</a>';
                    echo '<td> <a class=\'btn btn-primary\' method="post" href="ArtistTable.php?task=delete&deleteId=' . $a->id . '">Delete</a>';
                    echo '</tr>';
            }
            ?>
</table>