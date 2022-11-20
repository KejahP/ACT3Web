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

    ?>
    <body>
        <?php include_once(dirname(__DIR__) . '/shared/navbar.php');?>
        <main class="mainContentAlignment outline">
            <?php
                //  Get the Member
                echo "<script>console.log('POST: " . $_POST['sEmail'] . "');</script>";
                echo "<script>console.log('POST: " . $_POST['sName'] . "');</script>";
                echo "<script>console.log('POST: " . isset($_POST['update']) . "');</script>";

                $member = Member::GetMember($conn, $_POST['sEmail'], $_POST['sName']);


                if(isset($_POST['update']))
                {
                    //  Convert Check Box State to Integer/Boolean/TinyInt stupid bullshit
                    //  If `sMonthly` has been POSTed
                    if (isset($_POST['sMonthly']))
                    {
                        $member->monthlyNews = 1;
                    }
                    else
                    {
                        $member->monthlyNews = 0;
                    }

                    //  If `sBreaking` has been POSTed
                    if (isset($_POST['sBreaking']))
                    {
                        $member->breakingNews = 1;
                    }
                    else
                    {
                        $member->breakingNews = 0;
                    }

                    //  If `sDelete` has been POSTed
                    if (isset($_POST['sDelete']))
                    {
                        $member->deleteRequest = 1;
                    }
                    else
                    {
                        $member->deleteRequest = 0;
                    }

                    $member->UpdateMember($conn);
                }


                echo "<script>console.log('POST: " . $member->id . "');</script>";
                echo "<script>console.log('POST: " . $member->email . "');</script>";
                echo "<script>console.log('POST: " . $member->name . "');</script>";
                echo "<script>console.log('POST: " . $member->monthlyNews . "');</script>";
                echo "<script>console.log('POST: " . $member->breakingNews . "');</script>";
                echo "<script>console.log('POST: " . $member->deleteRequest . "');</script>";
                

                //  Post to MembersUpdateRedirect page -    Convert Member's Monthly, Breaking and Delete fields to 'checked' or unchecked  MAY NOT BE POSTING CORRECTLY
                if($member->id != null) 
                {
                    echo"
                    <h3>Name: $member->name</h1>
                    <h4>Email: $member->email</h2>
                    ";
                    //echo"<form class='px-4 py-3' action='./MembersUpdateRedirect.php' method='post' target='_self'>";    
                        //  Test Solution below, redirect back to members tools, POST Inside of members tools
                        echo "
                        <form class='px-4 py-3' action='./MembersTools.php' method='post' target='_self'>
                            <div class='mb-3'>
                                <input type='hidden' class='form-control' id='sEmail' name='sEmail' value='$member->email'>
                            </div>
                            <div class='mb-3'>
                                <input type='hidden' class='form-control' id='sName' name='sName' value='$member->name'>
                            </div>
                            <div class='mb-3'>
                                <input type='hidden' class='form-control' id='update' name='update' value='update'> 
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