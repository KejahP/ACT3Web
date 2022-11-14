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

        // Print a List Item containing a sign up form for signing up to the mailing list
        /**
         * SignUpForm
         * Return the Formgroup used for adding a new entry into the mailing list in the db.
         */
        public static function SignUpForm($conn) // `action='#' posts the information back to the same page with a '#' empty fragment indentifier, no action posts back to same page
        {
            /*  Perhaps Wrap Form In Collapse?
                Perhaps change Action to redirect towards an I frame, inside of the drop down instead of refreshing entire page?
                TO DO:
                * Place Iframe within DropDown
                * Replace change target to Iframe OR action to Iframe, whatever gets best results. Change contents of Iframe to "Subsription Confirmed" OR "Already Subscribed"
            */
            echo"
                <li>
                    <div class='accordion accordion-flush' id='dropDownAccordion'>";

            // Accordion Item One - Submission Page
            echo "
                        <div class='accordion-item'>
                            <h2 class='accordion-header' id='submissionHeading'>
                                <button class='accordion-button' type='button' data-bs-toggle='collapse' data-bs-target='#collapseSubmission' aria-expanded='true' aria-controls='collapseSubmission'>
                                    Subscribe to Mailing List
                                </button>
                            </h2>
                            <div id='collapseSubmission' class='accordion-collapse collapse show' aria-labelledby='submissionHeading' data-bs-parent='dropDownAccordion'>
                                <div class='accordion-body'>
                                    <form class='px-4 py-3' action='../pages/MembersTools.php' method='post' target='_self'>
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
                                                    </ul>
                                            </div>
                                        </div>

                                        <input type='hidden' id='task' name='task' value='createMember'>
                                        <input class='btn btn-primary' type='submit'/>
                                    </form>
                                </div>
                            </div>
                        </div>";

                // Accordion Item Two - Member Controls
                echo"
                        <div class='accordion-item'>
                            <h2 class='accordion-header' id='memberHeading'>
                                <button class='accordion-button' type='button' data-bs-toggle='collapse' data-bs-target='#collapseMember' aria-expanded='true' aria-controls='collapseMember'>
                                    Update Subscription
                                </button>
                            </h2>
                            <div id='collapseMember' class='accordion-collapse collapse' aria-labelledby='memberHeading' data-bs-parent='dropDownAccordion'>
                                <div class='accordion-body'>
                                    <form class='px-4 py-3' action='../pages/MembersTools.php' method='post' target='_self'>
                                        <div class='mb-3'>
                                            <label for='sEmail' class='form-label'>Email address</label>
                                            <input type='email' class='form-control' id='sEmail' name='sEmail' placeholder='email@example.com'>
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
                                                    </ul>
                                            </div>
                                        </div>

                                        <input class='btn btn-primary' type='submit'/>
                                    </form>
                                </div>
                            </div>
                        </div>";

                echo "   </div>    
                </li>";

            // If task is equal to create member than Perform Create Query
            SubmissionForm::SelectMethod($conn); 
            //SubmissionForm::SignUpUserToDB($conn);
        }

        //  Selects the correct method to call based on the task that has been posted
        public static function SelectMethod($conn)
        {
            if(isset($_POST['task']))
            {
                if($_POST['task'] == "createMember")
                {
                    SubmissionForm::SignUpUserToDB($conn);
                }
                else if ($_POST['task'] == "update")
                {
    
                }
            }
            
        }

        //<button type='submit' class='btn btn-primary'>Sign Up</button>
        //<input class='btn btn-primary' type='submit'/>
        public static function SignUpUserToDB($conn)
        {
            $monthly = true;
            $breaking = true;
            //  Check for user input
            if(isset($_POST['sEmail']))
            {
                $daemail = $_POST['sEmail'];

                if(!isSet($_POST['sMonthly']))
                {
                    $monthly = 0;
                }

                if(!isSet($_POST['sBreaking']))
                {
                    $breaking = 0;
                }

                $insertEmailQuery = "INSERT INTO member(name, email, monthlyNews, breakingNews, deleteRequest) VALUES (:name, :email, :monthlyNews, :breakingNews, :deleteRequest)";
                $data=
                [
                    'name' => $_POST['sName'],
                    'email' => $_POST['sEmail'],
                    'monthlyNews' => $monthly,
                    'breakingNews' => $breaking,
                    'deleteRequest' => 0,
                ];

                foreach($data as $entry)
                {
                    echo "<script>console.log('" . $entry . "');</script>";
                }

                $stmt = $conn->prepare($insertEmailQuery);
                $stmt->execute($data);
            }
        }
    }
?>