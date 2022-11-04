<!DOCTYPE html>
<html lang="en">
<!--
    Rhys Gillham
    M133320
    The index page for the website, it explains the assessment in basic detail and those involved.

    All common includes are done in the navbar partial render in shared.
-->
<?php
include_once(dirname(__DIR__) . '/shared/head.php');
?>


<body>
    <?php include_once(dirname(__DIR__) . '/shared/navbar.php'); ?>
    <main class="mainContentAlignment outline">
        <h1>Welcome</h1>
        <div class="container text-center">
            <p>
                Manager: Kejah Pulman (30034444)
            </p>
            <p>
            <ul> Programmers:
                <li>Rhys Gillham (M133320)</li>
                <li>Andrew Masar (P271838) </li>
            </ul>
            <p>
                Website for Agile Web Development AT3 - Sprint One.

                Creating a website using MySQL, PHP, HTML, and CSS to dynamically pull data and display it in a user friendly format.
                This involves displaying the full collection of paintings along with their information and allowing for single paintings to be selected.
                Search terms are accepted and will attempt to find the painting by exact name.
            </p>
            </p>
        </div>
    </main>
</body>

</html>