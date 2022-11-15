<!--
    Kejah Pulman
    30034444

    Allows the user to login and acess the memeber
-->
<?php
include_once(dirname(__DIR__) . '/pages/EmailTable.php');

        class SubLog
        {
            public static function Login ($conn)
            {
                echo "<li>
                    <form class='px-4 py-3' action='../script/ConnAdmin.php' method='post' target='_self'>
                    <div class='mb-3'>
                        <label for='logUser' class='form-label'>Email address</label>
                        <input type='text' class='form-control' id='logUser' name='logUser' placeholder='Username'>
                    </div>

                    <div class='mb-3'>
                        <label for='logPass' class='form-label'>Password</label>
                        <input type='text' class='form-control' id='logPass' name='logPass' placeholder='Password'>
                    </div>

                    <input class='btn btn-primary' type='submit'/>
                    </form>
            </li>";

                // $userName = $_GET['logUser'];
                // $userPass = $_GET['logPass'];
                // ConnAdmin::AdminLogin($userName, $userPass);
            }


        }
?>