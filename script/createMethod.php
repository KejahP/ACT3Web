<!--
        Andrew Masar
        P271838

        Rhys Gillham
        M133320

        This will attempt to commit POST data and then refresh to the artist table.
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
        <a href=\"./pages/index.php\">Click here to redirect</a>
    </body>

    </html>";

$data = [
    'imageFile' => $image = file_get_contents($_FILES['pimage']['tmp_name']),
    'name' => $_POST['pname'],
    'year' => $_POST['pyear'],
    'artist' => $_POST['partist'],
    'medium' => $_POST['pmedium'],
    'style' => $_POST['pstyle'],
];

$query = "INSERT INTO paintings(name, imageFile, year, artistID, medium, style) VALUES(:name, :imageFile, :year, :artist, :medium, :style)";
$stmt = $conn->prepare($query);
$stmt->execute($data);
