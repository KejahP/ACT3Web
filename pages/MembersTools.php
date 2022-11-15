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

                //  Post to MembersUpdateRedirect page
                //  Email and Name should be hidden fields that are posted
                if($member->id != null) // I DONT THINK THIS IS WORKING
                {
                    echo"
                    <h3>Name: $member->name</h1>
                    <h4>Email: $member->email</h2>
                        <form class='px-4 py-3' action='./MembersUpdateRedirect.php' method='post' target='_self'>    
                            <div class='mb-3'>
                                <input type='hidden' class='form-control' id='sEmail' name='sEmail' value='$member->email'>
                            </div>
                            <div class='mb-3'>
                                <input type='hidden' class='form-control' id='sName' name='sName' value='$member->name'>
                            </div>
                            <div class='mb-3'>
                                <div class='form-check'>
                                    <ul>
                                        <li>
                                            <label class='form-check-label' for='sMonthly'>Monthly News Roundup</label>
                                            <input type='checkbox' class='form-check-input' id='sMonthly' name='sMonthly' ".$member->ToChecked($member->monthlyNews).">
                                        </li>
                                        <li>
                                            <label class='form-check-label' for='sBreaking'>Breaking News</label>
                                            <input type='checkbox' class='form-check-input' id='sBreaking' name='sBreaking' ".$member->ToChecked($member->breakingNews).">
                                        </li>
                                        <li>
                                            <label class='form-check-label' for='sDelete'>Delete Membership?</label>
                                            <input type='checkbox' class='form-check-input' id='sDelete' name='sDelete' ".$member->ToChecked($member->deleteRequest).">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <input class='btn btn-primary' type='submit'/>
                    </form>";
                }
                else
                {
                    echo "<h3>No Member Found</h3>";
                }
            ?>

            
            
        </main>
    </body>

</html>