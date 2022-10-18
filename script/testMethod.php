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
        <meta http-equiv=\"Refresh\" content=\"30; ../pages/painting_filtered.php?id=" . $_POST['pid'] . "\">
    </head>

    <body>
        <a href=\"./pages/index.php\">Click here to redirect</a>
    </body>

    </html>";
    //$eImage = fopen($_POST['pimage'], 'rb');
    //$eImage = file_get_contents();

$sqlQuery = "UPDATE paintings 
    SET name='" . $_POST['pname'] .
    "',imagefile='".file_get_contents($_POST['pimage']). $eImage. //"',imagefile='" . $eImage. //$_POST['pimage'] #"" .
    "', year='" . $_POST['pyear'] . 
    "', artist='" . $_POST['partist'] . 
    "', medium='" . $_POST['pmedium'] . 
    "', style='" . $_POST['pstyle'] .
  "' WHERE id=" . $_POST['pid'] . "";
echo $sqlQuery;
$stmt = $conn->prepare($sqlQuery);
$stmt->execute();
