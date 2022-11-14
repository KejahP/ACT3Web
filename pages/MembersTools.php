<!DOCTYPE html>
    <html lang="en">
    <!--
        
     █████╗ ███╗   ██╗██████╗ ██████╗ ███████╗██╗    ██╗    ███╗   ███╗ █████╗ ███████╗ █████╗ ██████╗     ██████╗ ██████╗ ███████╗ ██╗ █████╗ ██████╗  █████╗ 
    ██╔══██╗████╗  ██║██╔══██╗██╔══██╗██╔════╝██║    ██║    ████╗ ████║██╔══██╗██╔════╝██╔══██╗██╔══██╗    ██╔══██╗╚════██╗╚════██║███║██╔══██╗╚════██╗██╔══██╗
    ███████║██╔██╗ ██║██║  ██║██████╔╝█████╗  ██║ █╗ ██║    ██╔████╔██║███████║███████╗███████║██████╔╝    ██████╔╝ █████╔╝    ██╔╝╚██║╚█████╔╝ █████╔╝╚█████╔╝
    ██╔══██║██║╚██╗██║██║  ██║██╔══██╗██╔══╝  ██║███╗██║    ██║╚██╔╝██║██╔══██║╚════██║██╔══██║██╔══██╗    ██╔═══╝ ██╔═══╝    ██╔╝  ██║██╔══██╗ ╚═══██╗██╔══██╗
    ██║  ██║██║ ╚████║██████╔╝██║  ██║███████╗╚███╔███╔╝    ██║ ╚═╝ ██║██║  ██║███████║██║  ██║██║  ██║    ██║     ███████╗   ██║   ██║╚█████╔╝██████╔╝╚█████╔╝
    ╚═╝  ╚═╝╚═╝  ╚═══╝╚═════╝ ╚═╝  ╚═╝╚══════╝ ╚══╝╚══╝     ╚═╝     ╚═╝╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝╚═╝  ╚═╝    ╚═╝     ╚══════╝   ╚═╝   ╚═╝ ╚════╝ ╚═════╝  ╚════╝

    Members Tools Webpage
    The purpose of this webpage is to allow users who have logged in to control the emails that they are receiving.
    -->
    <?php
    include_once(dirname(__DIR__) . '/shared/head.php');
    include_once(dirname(__DIR__) . '/script/connection.php');        //Currently set to connect to xampp using a copy of Andrews initial ConnectionHome.php in resources.
    include_once(dirname(__DIR__) . '/script/sql_commands.php');
    include_once(dirname(__DIR__) . '/script/MemberModel.php');

    $member = Member::GetMember($conn, $_POST['sEmail'], $_POST['sName']);

    //  Get the member
    //if(isset($_POST['sEmail']) && isset($_POST['sName']))
    //{
        //$member = Member::GetMember($conn, $_POST['sEmail'], $_POST['sName']);
    //}
        
    /*
        TO DO:
            * Populate this page with the update functionality for the Members db
            * 
    */


    ?>
    <body>
        <?php include_once(dirname(__DIR__) . '/shared/navbar.php'); ?>
        <main class="mainContentAlignment outline">
            <?php
            /*
                if(isset($_POST['sEmail']))
                {
                    echo $_POST['sEmail'];
                };
            */
                echo "<p>$member->name</p>";
                echo "<p>$member->email</p>";
                echo "<p>$member->monthlyNews</p>";
                echo "<p>$member->breakingNews</p>";
                echo "<p>$member->deleteRequest</p>";
            ?>
        </main>
    </body>

</html>