<!--
        Rhys Gillham
        M133320
        This is the connection file for access to the database.
-->

<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "paintingdb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username); // XAMPP Doesn't require Password
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
