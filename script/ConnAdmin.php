<!--
        Kejah Pulman 
        30034444

        This connection file connects to the database with the admin permissions
-->

<?php

$servername = "localhost";
$dbname = "paintingdb";

//delete later
// $username = "m133320";
// $password = "P@ssw0rd";
$username = "";
$password = "";

echo "script"
if(isset($_POST['logUser']))
{
    $username = $_POST['logUser'];
}

if(isset($_POST['logPass']))
{
    $password = $_POST['logPass'];
}

try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); // XAMPP Doesn't require Password
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";

    Emails::EmailTable($conn);
} catch (PDOException $e) {
    echo
    "
   <!DOCTYPE html>
    <html lang=\"en\">

    <head>
        <meta http-equiv=\"Refresh\" content=\"0; ../pages/index.php\">
    </head>

    <body>
        <a href=\"../pages/index.php\">Click here to redirect</a>
    </body>

    </html>";
}

?>