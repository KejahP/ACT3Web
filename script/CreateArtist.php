<!--
        Andrew Masar
        P271838

-->
<?php
include_once(dirname(__DIR__) . '/script/connection.php');

echo
"
   <!DOCTYPE html>
    <html lang=\"en\">

    <head>
        <meta http-equiv=\"Refresh\" content=\"3; ../pages/ArtistTable.php\">
    </head>

    <body>
        <a href=\"./pages/index.php\">Click here to redirect</a>
    </body>

    </html>";


$data = [
    'imageFile' => $image = file_get_contents($_FILES['aimage']['tmp_name']),   // Lazy copy pasted, dunno about ['tmp_name']
    'artistName' => $_POST['aname'],
    'lifeSpan' => $_POST['alifespan'],
    'style' => $_POST['astyle'],
];

$query = "INSERT INTO artists(artistName, imageFile, style, lifeSpan) VALUES(:artistName, :imageFile, :style, :lifeSpan)";
$stmt = $conn->prepare($query);
$stmt->execute($data);
