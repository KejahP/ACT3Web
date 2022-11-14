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
    include_once(dirname(__DIR__) . '/script/sql_commands.php');
    include_once(dirname(__DIR__) . '/script/MemberModel.php');

        
    /*
        TO DO:
            * Populate this page with the update functionality for the Members db
            * 
    */


    ?>
    <body>
        <?php include_once(dirname(__DIR__) . '/shared/navbar.php');?>
        <main class="mainContentAlignment outline">
            <?php
                //  Get the Member
                echo "<script>console.log('POST: " . $_POST['sEmail'] . "');</script>";
                echo "<script>console.log('POST: " . $_POST['sName'] . "');</script>";
                $member = Member::GetMember($conn, $_POST['sEmail'], $_POST['sName']);
            ?>

            <form class='px-4 py-3' action='.' method='post' target='_self'>
                <div class='mb-3'>
                    <label for='sEmail' class='form-label'>Email address</label>
                    <input type='email' class='form-control' id='sEmail' name='sEmail' placeholder='email@example.com'>
                </div>
                <div class='mb-3'>
                    <label for='sName' class='form-label'>Name</label>
                    <input type='text' class='form-control' id='sName' name='sName' placeholder='John Doe'>
                </div>
                <div class='mb-3'>
                    <div class='form-check'>
                        <ul>
                            <li>
                                <label class='form-check-label' for='sMonthly'>Monthly News Roundup</label>
                                <input type='checkbox' class='form-check-input' id='sMonthly' name='sMonthly' value=true>
                            </li>
                            <li>
                                <label class='form-check-label' for='sBreaking'>Breaking News</label>
                                <input type='checkbox' class='form-check-input' id='sBreaking' name='sBreaking' value=true>
                            </li>
                            <li>
                                <label class='form-check-label' for='sDelete'>Delete Membership?</label>
                                <input type='checkbox' class='form-check-input' id='sDelete' name='sDelete' value=true>
                            </li>
                        </ul>
                    </div>
                </div>
                <input class='btn btn-primary' type='submit'/>
            </form>
        </main>
    </body>

</html>