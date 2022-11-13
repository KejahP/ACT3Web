<!DOCTYPE html>
<html lang="en">
<!--
        Kejah Pulman
        30034444

        This is the template for the display of all emails and can only be acessed via an admin login
-->
<?php
    include_once(dirname(__DIR__) . '/shared/navbar.php');
    include_once(dirname(__DIR__) . '/script/connection.php');
    include_once(dirname(__DIR__) . '/shared/head.php');

    echo '<h1>' . "Client Emails" . '</h1>';
    $sqlEmail = "SELECT * FROM member ORDER BY member.firstName";
?>

<body>
    <main class="mainContentAlignment">
        <table class="table">
            <thead>
                <th scope="col">firstName</th>
                <th scope="col">lastName</th>
                <th scope="col">email</th>
                <th scope="col">monthlyNews</th>
                <th scope="col">breakingNews</th>
                <th scope="col">deleteRequest</th>
            </thead>

            <?php
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

                //testing of the email page DELETE LATER BITCH
                include_once(dirname(__DIR__) . '/shared/email.php');

            ?>
        </table>
    </main>
</body>