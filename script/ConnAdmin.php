<!--
        Kejah Pulman 
        30034444

        This connection file connects to the database with the admin permissions
-->

<?php

class ConnAdmin
{
    public static function AdminLogin($username, $password)
    {
        $servername = "localhost";
        $dbname = "paintingdb";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); // XAMPP Doesn't require Password
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
        } 
        catch (PDOException $e) 
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
?>