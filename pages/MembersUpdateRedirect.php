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
    include_once("../script/connection.php");
    include_once(dirname(__DIR__) . '/script/MemberModel.php');
    
    $member = Member::GetMember($conn, $_POST['sEmail'], $_POST['sName']);

    //  Perform SQL Query Below
    echo "<script>console.log('POST: " . $member->id . "');</script>";
    echo "<script>console.log('POST: " . $_POST['sEmail'] . "');</script>";
    echo "<script>console.log('POST: " . $_POST['sName'] . "');</script>";
    echo "<script>console.log('POST: " . $_POST['sMonthly'] . "');</script>";
    echo "<script>console.log('POST: " . $_POST['sBreaking'] . "');</script>";
    echo "<script>console.log('POST: " . $_POST['sDelete'] . "');</script>";
            

    if(isset($_POST['sMonthly']))
    {
        $member->monthlyNews = $_POST['sMonthly'];
    }
    if(isset($_POST['sBreaking']))
    {
        $member->breakingNews = $_POST['sBreaking'];
    }
    if(isset($_POST['sDelete']))
    {
        $member->deleteRequest = $_POST['sDelete'];
    }

    $member->UpdateMember($conn);

    ?>
    <head>
        <!--<meta http-equiv="Refresh" content="0; ./pages/MembersTools.php">-->
    </head>
        <body>
            <main>
                <form name="member" id="member" action="./MembersTools.php" target='_self' method="post">
                    <input type="hidden" name="sEmail" value="<?php $member->email?>" />
                    <input type="hidden" name="sName" value="<?php $member->name?>" />
                </form>

                <script type="text/javascript">
                    window.onload=function()
                    {
                        var auto = setTimeout(function(){ autoRefresh(); }, 100);

                        function submitform(){
                        alert('test');
                        document.forms["member"].submit();
                        }

                        function autoRefresh(){
                        clearTimeout(auto);
                        auto = setTimeout(function(){ submitform(); autoRefresh(); }, 10000);
                        }
                    }
                </script>
            </main>    
        </body>
    </html>