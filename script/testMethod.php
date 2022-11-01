<!--
        Andrew Masar
        P271838

        Rhys Gillham
        M133320

        Test Method for performing an edit operation
-->
<?php
include_once(dirname(__DIR__) . '/script/connection.php');

echo
"
   <!DOCTYPE html>
    <html lang=\"en\">

    <head>
        <meta http-equiv=\"Refresh\" content=\"0; ../pages/painting_filtered.php?id=" . $_POST['pid'] . "\">
    </head>

    <body>
        <a href=\"./pages/index.php\">Click here to redirect</a>
    </body>

    </html>";

$data = [
    'name' => $_POST['pname'],
    'year' => $_POST['pyear'],
    'artist' => $_POST['partist'],
    'medium' => $_POST['pmedium'],
    'style' => $_POST['pstyle'],
    'id' => $_POST['pid'],
];

$query = "UPDATE paintings SET name=:name, year=:year, artistID=:artist, medium=:medium, style=:style WHERE id=:id";
$stmt = $conn->prepare($query);
$stmt->execute($data);
