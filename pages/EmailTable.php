<!DOCTYPE html>
<html lang="en">
<!--
        Kejah Pulman
        30034444

        Rhys Gillham
        M133320

        This is the template for the display of all emails and can only be acessed via an admin login
-->

<?php

include_once(dirname(__DIR__) . '/script/connection.php');
include_once(dirname(__DIR__) . '/shared/head.php');
include_once(dirname(__DIR__) . '/shared/navbar.php');
include_once(dirname(__DIR__)) . '/script/MemberModel.php';

$sqlEmail = "SELECT * FROM member ORDER BY member.deleteRequest DESC, member.email";
$breaking = 0;
$monthly = 0;
$delete = "None";

if (isset($_POST['search']))
{
    $sqlEmail = "SELECT * FROM member WHERE member.email LIKE '%" . $_POST['search'] . "%' ORDER BY member.deleteRequest DESC, member.email";
}
elseif (isset($_POST['MonthlyNews']))
{
    $sqlEmail = "SELECT * FROM member WHERE member.monthlyNews = 1 ORDER BY member.email";
}
elseif (isset($_POST['BreakingNews']))
{
    $sqlEmail = "SELECT * FROM member WHERE member.breakingNews = 1 ORDER BY member.email";
}
elseif(isset($_POST['Delete'])){
    $sql = "DELETE FROM member WHERE id =" . $_POST['id'].";";
    $sql = $conn->prepare($sql);
    $sql->execute();
}
?>

<body>
    <main class="mainContentAlignment">

        <h1>Member Emails</h1>

        <form class="d-flex searchSizing" action="EmailTable.php" method="post">
            <input class="form-control" placeholder="Email" type="search" name="search">
            <input class="btn" type="submit">
        </form>

        <table class="table">
            <thead>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">
                    <form class="d-flex searchSizing" action="EmailTable.php" method="post">
                        <div class="row justify-content-start">
                            <div class="col-7">
                                <label for="fMonthly">Monthly News</label>
                            </div>
                            <div class="col-3">
                                <input type="submit" id="fMonthly" name="MonthlyNews" value="V">
                            </div>
                        </div>
                    </form>
                </th>
                <th scope="col">
                    <form class="d-flex searchSizing" action="EmailTable.php" method="post">
                        <div class="row justify-content-start">
                            <div class="col-7">
                                <label for="fBreaking">Breaking News</label>
                            </div>
                            <div class="col-3">
                                <input type="submit" id="fBreaking" name="BreakingNews" value="V">
                            </div>
                        </div>
                    </form>
                </th>
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

                Member::ConvertCheckbox($row['monthlyNews']);
                Member::ConvertCheckbox($row['breakingNews']);
                Member::ConvertCheckbox($row['deleteRequest']);
                
                echo "<td scope='row'> 
                        <form action='EmailTable.php' method='post'>
                        <input hidden type='text' name='Delete' value='delete'>
                        <input hidden type='text' name='id' value='".$row['id']. "'>
                            <input class='btn btn-primary' type='submit' value='Delete'>
                        </form>              
                    </td>";
                echo "</tr>";
            }

            ?>
        </table>
    </main>
</body>