<?php
include_once(dirname(__DIR__) . '/script/connection.php');
//$this->name = $_POST['pname'];

//$sqlQuery = "UPDATE paintings SET name=?, image=?, year=?, artist=?, medium=?, style=? WHERE id=?"; //change paintings to db name
//$sqlQuery = "UPDATE paintings SET name=" . $_POST['pname'] . ", image=" . $_POST['pimage'] . ", year=" . $_POST['pyear'] . ", artist=" . $_POST['partist'] . ", medium=" . $_POST['pmedium'] . ", style=" . $_POST['pstyle'] . " WHERE id=" . $_POST['pid'] . ""; //change paintings to db name

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

$sqlQuery = "UPDATE paintings 
    SET name='" . $_POST['pname'] .
    "',imagefile='" . $_POST['pimage'] . 
    "', year='" . $_POST['pyear'] . 
    "', artist='" . $_POST['partist'] . 
    "', medium='" . $_POST['pmedium'] . 
    "', style='" . $_POST['pstyle'] .
  "' WHERE id=" . $_POST['pid'] . ""; //change paintings to db name
//echo $sqlQuery;

$stmt = $conn->prepare($sqlQuery);
//$stmt->execute($_POST['pname'], $_POST['pimage'], $_POST['pyear'], $_POST['partist'], $_POST['pmedium'], $_POST['pstyle'], $_POST['pid']);
$stmt->execute();
//echo "successful";


//echo "<meta http-equiv='Refresh' content=\"0; url='$add/pages/painting_filtered.php?" . $_POST['pid'] . "' />";
