<?php
	$servername = "localhost";
	$username = "root";
  $password = "password";
  $dbname = "paintingdb";   
  //$dbname="images";

try 
{
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username); //, $password I think xampp doesn't require it
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} 
catch(PDOException $e) 
{
  echo "Connection failed: " . $e->getMessage();
}
//?//>        //Coommented out temporarily