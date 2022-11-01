<!--
        Andrew Masar
        P271838

        Perform an edit operation for a single artist in the database
-->
<?php
include_once(dirname(__DIR__) . '/script/connection.php');

// Modify 'content=.... . $_POST['aid'] .
echo
"
   <!DOCTYPE html>
    <html lang=\"en\">

    <head>
        <meta http-equiv=\"Refresh\" content=\"0; ../pages/ArtistFiltered.php?id=" . $_POST['pid'] . "\">
    </head>

    <body>
        <a href=\"./pages/index.php\">Click here to redirect</a>
    </body>

    </html>";

$data = [
    'artistName' => $_POST['aname'],
    'lifeSpan' => $_POST['alifespan'],
    'style' => $_POST['astyle'],
    'artistID' => $_POST['aid'],
];

$query = "UPDATE artists SET  artistName=:artistName, lifeSpan=:lifeSpan, style=:style WHERE artistID=:artistID";
$stmt = $conn->prepare($query);
$stmt->execute($data);