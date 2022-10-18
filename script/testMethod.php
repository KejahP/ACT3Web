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
        <meta http-equiv=\"Refresh\" content=\"5; ../pages/painting_filtered.php?id=" . $_POST['pid'] . "\">
    </head>

    <body>
        <a href=\"./pages/index.php\">Click here to redirect</a>
    </body>

    </html>";

if(isset($_FILES['pimage'])){
    $image = file_get_contents($_FILES['pimage']['tmp_name']);
}

$sqlQuery = "UPDATE paintings 
    SET name='" . $_POST['pname'] .
    "',imagefile='" . $image .
    "', year='" . $_POST['pyear'] .
    "', artist='" . $_POST['partist'] .
    "', medium='" . $_POST['pmedium'] .
    "', style='" . $_POST['pstyle'] .
    "' WHERE id=" . $_POST['pid'] . "";
$stmt = $conn->prepare($sqlQuery);
$stmt->execute();
