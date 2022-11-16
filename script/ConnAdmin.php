<!--
        Kejah Pulman 
        30034444

        Rhys Gillham
        M133320

        This connection file connects to the database with the admin permissions
-->

<?php

$servername = "localhost";
$dbname = "paintingdb";

//Change for the admin login to check, change when on the server to include the password.
// $username = "m133320";
// $password = "P@ssw0rd";
$username = "";
$password = "";

if(isset($_POST['logUser']))
{
    $username = $_POST['logUser'];
}

if(isset($_POST['logPass']))
{
    $password = $_POST['logPass'];
}

try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username); // XAMPP Doesn't require Password
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo
    "
   <!DOCTYPE html>
    <html lang=\"en\">

    <head>
        <meta http-equiv=\"Refresh\" content=\"0; ../pages/EmailTable.php\">
    </head>

    <body>
    <h1> Connection successful!</h1>
        <a href=\"../pages/EmailTable.php\">Click here to redirect</a>
    </body>

    </html>";
    //Emails::EmailTable($conn);
} catch (PDOException $e) {
    echo
    "
   <!DOCTYPE html>
    <html lang=\"en\">

    <head>
        <meta http-equiv=\"Refresh\" content=\"1; ../pages/index.php\">
    </head>

    <body class='mainContentAlignment'>
    <h1> Connection has not been successful </h1>
        <a href=\"../pages/index.php\">Click here to redirect</a>
    </body>

    </html>";
}

?>