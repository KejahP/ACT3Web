<!--
    Kejah Pulman
    30034444

    Allows the user to login and acess the memeber
-->
<?php
        include_once(dirname(__DIR__) . '/script/connection.php');
        include_once(dirname(__DIR__) . '/script/ConnAdmin.php');
        include_once(dirname(__DIR__) . '/shared/head.php');

        class SubLog
        {
            public static function Login ($conn)
            {
                echo "<li>
                    <form class='px-4 py-3' action='../pages/EmailTable.php' method='post' target='_self'>
                    <div class='mb-3'>
                        <label for='logUser' class='form-label'>Email address</label>
                        <input type='user' class='form-control' id='logUser' name='logUser' placeholder='Username'>
                    </div>

                    <div class='mb-3'>
                        <label for='logPass' class='form-label'>Password</label>
                        <input type='text' class='form-control' id='logPass' name='logPass' placeholder='Password'>
                    </div>

                    <input type='hidden' id='task' name='task' value=''>
                    <input class='btn btn-primary' type='submit'/>
                    </form>
            </li>";

                // $userName = $_GET['logUser'];
                // $userPass = $_GET['logPass'];
                // ConnAdmin::AdminLogin($userName, $userPass);
            }

            public static function FailedLogin ($conn, $e)
            {

            }
        }
?>