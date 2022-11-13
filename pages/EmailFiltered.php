<!DOCTYPE html>
<html lang="en">

<!--
        Kejah Pulman
        30034444
        
        This is the template for the search display for the emeails
-->
<?php
    include_once(dirname(__DIR__) . '/shared/head.php');
    include_once(dirname(__DIR__) . '/shared/navbar.php');
    include_once(dirname(__DIR__) . '/pages/EmailTable.php');

        $search = $_POST['search'];
        $sqlEmail = "SELECT * FROM member WHERE firstName LIKE '%" . $search . "%' ORDER BY firstName";
        $sqlEmail = $conn->prepare($sqlEmail);
        $sqlEmail->execute();
        echo '<h1>' . $search . '</h1>';


        echo '<main class="mainContentAlignment">';
        echo "<table class='table'>
        <thead>
        <th scope='col'>firstName</th>
        <th scope='col'>lastName</th>
        <th scope='col'>email</th>
        <th scope='col'>monthlyNews</th>
        <th scope='col'>breakingNews</th>
        <th scope='col'>deleteRequest</th>
        </thead>";

        $sqlEmail = $conn->prepare($sqlEmail);
        $sqlEmail->execute();

        while($row = $sqlEmail->fetch())
        {
            echo "<tr>";
            echo "<td scope = \"row\">" . $row['firstName'] . "</td>";
            echo "<td scope = \"row\">" . $row['lastName'] . "</td>";
            echo "<td scope = \"row\">" . $row['email'] . "</td>";

            echo "<td scope = \"row\">" . $row['monthlyNews'] . "</td>";
            echo "<td scope = \"row\">" . $row['breakingNews'] . "</td>";
            echo "<td scope = \"row\">" . $row['deleteRequest'] . "</td>";
            echo "</tr>";
        }

        //testing of the email page
        include_once(dirname(__DIR__) . '/shared/email.php');

    ?>
        echo "</table>";
        echo '</main>';
?>