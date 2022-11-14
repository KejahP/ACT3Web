<!--
        Rhys Gillham
        M133320

        Kejah Pulman
        30034444

        This is the connection file for access to the database with basic permissions
-->

<?php
$servername = "localhost";
$username = "user";
$dbname = "paintingdb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username); // XAMPP Doesn't require Password
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} catch (PDOException $e) {
    //CHANGE THIS IF INCORRECT SHOWS UP AND SHOWS BAD LOGIN
    echo "Connection failed: " . $e->getMessage();
}
?>
