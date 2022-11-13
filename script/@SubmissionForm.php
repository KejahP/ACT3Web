<?php
/*
     █████╗ ███╗   ██╗██████╗ ██████╗ ███████╗██╗    ██╗    ███╗   ███╗ █████╗ ███████╗ █████╗ ██████╗     ██████╗ ██████╗ ███████╗ ██╗ █████╗ ██████╗  █████╗ 
    ██╔══██╗████╗  ██║██╔══██╗██╔══██╗██╔════╝██║    ██║    ████╗ ████║██╔══██╗██╔════╝██╔══██╗██╔══██╗    ██╔══██╗╚════██╗╚════██║███║██╔══██╗╚════██╗██╔══██╗
    ███████║██╔██╗ ██║██║  ██║██████╔╝█████╗  ██║ █╗ ██║    ██╔████╔██║███████║███████╗███████║██████╔╝    ██████╔╝ █████╔╝    ██╔╝╚██║╚█████╔╝ █████╔╝╚█████╔╝
    ██╔══██║██║╚██╗██║██║  ██║██╔══██╗██╔══╝  ██║███╗██║    ██║╚██╔╝██║██╔══██║╚════██║██╔══██║██╔══██╗    ██╔═══╝ ██╔═══╝    ██╔╝  ██║██╔══██╗ ╚═══██╗██╔══██╗
    ██║  ██║██║ ╚████║██████╔╝██║  ██║███████╗╚███╔███╔╝    ██║ ╚═╝ ██║██║  ██║███████║██║  ██║██║  ██║    ██║     ███████╗   ██║   ██║╚█████╔╝██████╔╝╚█████╔╝
    ╚═╝  ╚═╝╚═╝  ╚═══╝╚═════╝ ╚═╝  ╚═╝╚══════╝ ╚══╝╚══╝     ╚═╝     ╚═╝╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝╚═╝  ╚═╝    ╚═╝     ╚══════╝   ╚═╝   ╚═╝ ╚════╝ ╚═════╝  ╚════╝
 */

/**
 * Andrew Masar P271838
 * Submission Form
 * The Purpose of this class is to contain all the required functions for a user to Submit thier information to the Mailing List 
 */
    class SubmissionForm
    {

        


        public $userName;           #   String - Firstname plus Lastname field OR nameField
        public $email;              #   String - Email
        public $monthlyNews;        #   Boolean
        public $breakingNews;       #   Boolean
        public $deleteRequest;      #   Boolean

        // Print a List Item containing a sign up form for signing up to the mailing list
        /**
         * SignUpForm
         * Return the Formgroup used for adding a new entry into the mailing list in the db.
         */
        public static function SignUpForm() // `action='#' posts the information back to the same page with a '#' empty fragment indentifier, no action posts back to same page
        {
            /*  Perhaps Wrap Form In Collapse?
                Perhaps change Action to redirect towards an I frame, inside of the drop down instead of refreshing entire page?
                TO DO:
                * Place Iframe within DropDown
                * Replace change target to Iframe OR action to Iframe, whatever gets best results. Change contents of Iframe to "Subsription Confirmed" OR "Already Subscribed"
            */
            echo"
                <li>
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
                                        <input type='checkbox' class='form-check-input' id='sMonthly' name='sMonthly' value='true'>
                                    </li>
                                    <li>
                                        <label class='form-check-label' for='sBreaking'>Breaking News</label>
                                        <input type='checkbox' class='form-check-input' id='sBreaking' name='sBreaking' value='true'>
                                    </li>
                                    </ul>
                            </div>
                        </div>
                        <input class='btn btn-primary' type='submit'/>
                        
                    </form>
                </li>";
            
        }

                                //<button type='submit' class='btn btn-primary'>Sign Up</button>
                                //<input class='btn btn-primary' type='submit'/>
        public static function SignUpUserToDB()
        {
            //  Check for user input
            if(isset($_POST['sEmail']))
            {
                echo "An Email";
            // First GET signUpEmail from DB, see if there email is already in the db or

            // IF signUpEmail is not Present in DB than add user to DB

            // ELSE User is already in DB return a message stating that the email already exists
            }
            else
            {
                echo "No Email";
            }

        }
    }
?>