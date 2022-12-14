<!--
        Rhys Gillham
        M133320

        General connection to the server that the database is located on.
-->

<?php
$servername = "localhost";
$username = "root";
$password = "password";

try
{
    $conn = new PDO("mysql:host=$servername;dbname=paintingdb", $username); // XAMPP Doesn't require Password
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
}
catch (PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}
