<?php
$selection = 'browse';
if (isset($_GET['style'])) {
    $selection = 'style';
} elseif (isset($_GET['artist'])) {
    $selection = 'artist';
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
        <?php
        if ($selection == 'style') {
            echo '<h1>Sorted by Style</h1>';
        } elseif ($selection == 'artist') {
            echo '<h1>Sorted by Artist</h1>';
        } elseif ($selection == 'browse') {
            echo '<h1>Browse Page</h1>';
        }
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
            include_once(dirname(__DIR__) . '/script/temp_connection.php');        //Currently set to connect to xampp using a copy of Andrews initial ConnectionHome.php in resources.

            // NEW INCLUDE (FEEL FREE TO DELETE THIS COMMENT RHEESE)   
            include_once(dirname(__DIR__) . '/script/painting_model.php');
            
            //	IMAGES TABLE
            $sqlImages = "SELECT * FROM paintings";
            if ($selection == 'style') {
                $sqlImages = "SELECT * FROM paintings ORDER BY style";
            } elseif ($selection == 'artist') {
                $sqlImages = "SELECT * FROM paintings ORDER BY artist";
            }

            $stmtImages = $conn->prepare($sqlImages);
            $stmtImages->execute();

            while ($row = $stmtImages->fetch(PDO::FETCH_BOTH)) 
            {
                $a = painting::FromRow($row);
                
                echo '<tr>';
                #echo sprintf('<a method="post" href="template_single.php?id=%d">', $a->id);  
                echo '<td><a method="post" href="template_single.php?id='.$a->id.'"> '.$a->id.' </a></td>';     
                echo '<td>' .  $a->name . '</td>';
                echo '<td>' .
                    $a->createImage("300px", "300px")       
                    . '</td>';
                echo '<td>' . $a->year . ' </td>';
                echo '<td>' . $a->year . ' </td>';
                echo '<td>' . $a->medium . ' </td>';
                echo '<td>' . $a->style . ' </td>';
                echo '<td> <a class=\'btn btn-primary\' method="post" href="template_single.php?id=' . $a->id . '">Go To</a>';
                echo '</a>';
                echo '</tr>';
            }
            ?>
</body>

</html>