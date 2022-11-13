<?php
/*
        Kejah Pulman
        30034444
        the email signup option with the ability to adds any submitted data to the database
*/
    include_once(dirname(__DIR__) . '/script/connection.php');        
    include_once(dirname(__DIR__) . '/script/sql_commands.php');
    include_once(dirname(__DIR__) . '/script/painting_model.php');
?>

    
<h4>Join Our Newsletter!</h4>

<body>
    We have both monthly updates of our website as well as any breaking news relating to any of the piecies we display.
    To signup just link your first name, last name, email and select if you want monthly and/or breaking news emails 
    then submit your email.
</body>

<div class="form-check">
    <input class="form-control" placeholder="Firstname" name="userName">
    <input class="form-control" placeholder="Lastname" name="userPass">
    <input class="form-control" placeholder="email@example.com" name="userEmail">


    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="month" id="month" value="month" checked>
            <label class="form-check-label" for="month">
                Monthly News
            </label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="break" id="break" value="break" checked>
            <label class="form-check-label" for="break">
                Breaking News
            </label>
    </div>


    <a class="btn" href="ema.php">
        Sign Up
    </a>
</div>
