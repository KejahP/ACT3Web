<!--
        Andrew Masar
        P271838

        Rhys Gillham
        M133320

        This will attempt to commit all POST data to the database and then refresh to the artist table.
-->
<?php
include_once(dirname(__DIR__) . '/script/connection.php');

echo
"
   <!DOCTYPE html>
    <html lang=\"en\">

    <head>
        <meta http-equiv=\"Refresh\" content=\"0; ../pages/ArtistTable.php\">
    </head>

    <body>
        <a href=\"../pages/ArtistTable.php\">Click here to redirect</a>
    </body>

    </html>";


$data = [
    'imageFile' => $image = file_get_contents($_FILES['aimage']['tmp_name']),
    'artistName' => $_POST['aname'],
    'lifeSpan' => $_POST['alifespan'],
    'style' => $_POST['astyle'],
];

$query = "INSERT INTO artists(artistName, imageFile, style, lifeSpan) VALUES(:artistName, :imageFile, :style, :lifeSpan)";
$stmt = $conn->prepare($query);
$stmt->execute($data);
