<!DOCTYPE html>
<html lang="en">
<!--
        Kejah Pulman
        30034444

        This is the template for the display of all emails and can only be acessed via an admin login
-->
<?php

include_once(dirname(__DIR__) . '/script/connection.php');
include_once(dirname(__DIR__) . '/shared/head.php');
include_once(dirname(__DIR__) . '/shared/navbar.php');

$sqlEmail = "SELECT * FROM member ORDER BY member.name";
?>

<body>
    <main class="mainContentAlignment">

        <!--
        <form class="d-flex searchSizing" action="../script/EmailFiltered.php">
            <input class="form-control" placeholder="Search" type="search" name="search">
            <input class="btn" type="submit">
        </form>
-->
        <h1>Client Emails</h1>
        <table class="table">
            <thead>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Monthly News</th>
                <th scope="col">Breaking News</th>
                <th scope="col">Delete Requested</th>
            </thead>

            <?php
            $sqlEmail = $conn->prepare($sqlEmail);
            $sqlEmail->execute();

            while ($row = $sqlEmail->fetch())
            {
                echo "<tr>";
                echo "<td scope = \"row\">" . $row['name'] . "</td>";
                echo "<td scope = \"row\">" . $row['email'] . "</td>";

                echo "<td scope = \"row\">" . $row['monthlyNews'] . "</td>";
                echo "<td scope = \"row\">" . $row['breakingNews'] . "</td>";
                echo "<td scope = \"row\">" . $row['deleteRequest'] . "</td>";
                echo "</tr>";
            }

            //testing of the email page
            //include_once(dirname(__DIR__) . '/shared/email.php');

            ?>
        </table>
    </main>
</body>