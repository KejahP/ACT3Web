<?php
    /**
     *   █████╗ ███╗   ██╗██████╗ ██████╗ ███████╗██╗    ██╗    ███╗   ███╗ █████╗ ███████╗ █████╗ ██████╗     ██████╗ ██████╗ ███████╗ ██╗ █████╗ ██████╗  █████╗ 
     *  ██╔══██╗████╗  ██║██╔══██╗██╔══██╗██╔════╝██║    ██║    ████╗ ████║██╔══██╗██╔════╝██╔══██╗██╔══██╗    ██╔══██╗╚════██╗╚════██║███║██╔══██╗╚════██╗██╔══██╗
     *  ███████║██╔██╗ ██║██║  ██║██████╔╝█████╗  ██║ █╗ ██║    ██╔████╔██║███████║███████╗███████║██████╔╝    ██████╔╝ █████╔╝    ██╔╝╚██║╚█████╔╝ █████╔╝╚█████╔╝
     *  ██╔══██║██║╚██╗██║██║  ██║██╔══██╗██╔══╝  ██║███╗██║    ██║╚██╔╝██║██╔══██║╚════██║██╔══██║██╔══██╗    ██╔═══╝ ██╔═══╝    ██╔╝  ██║██╔══██╗ ╚═══██╗██╔══██╗
     *  ██║  ██║██║ ╚████║██████╔╝██║  ██║███████╗╚███╔███╔╝    ██║ ╚═╝ ██║██║  ██║███████║██║  ██║██║  ██║    ██║     ███████╗   ██║   ██║╚█████╔╝██████╔╝╚█████╔╝
     *  ╚═╝  ╚═╝╚═╝  ╚═══╝╚═════╝ ╚═╝  ╚═╝╚══════╝ ╚══╝╚══╝     ╚═╝     ╚═╝╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝╚═╝  ╚═╝    ╚═╝     ╚══════╝   ╚═╝   ╚═╝ ╚════╝ ╚═════╝  ╚════╝
     *
     *  MemberModel
     *  Provides the Model, and associated methods for the member class
     */
        
    /**
     * Member
     * Member Object for Pulling Entries from the database
     */
    class Member
    {
        public $id;
        public $name;
        public $email;
        public $monthlyNews;
        public $breakingNews;
        public $deleteRequest;
        
        /** 
         * __construct
         * Default Constructor for each member object
         * {id, name, email, monthlyNews, breakingNews, deleteRequest}
         */  
        public function __construct($id, $name, $email, $monthlyNews, $breakingNews, $deleteRequest)
        {
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->monthlyNews = $monthlyNews;
            $this->breakingNews = $breakingNews;
            $this->deleteRequest = $deleteRequest;
        }

        public function ToChecked($input)
        {
            if($input == 1)
            {
                return "checked";
            }
            else
            {
                return null;
            }
        }

        /**
         * FromRow
         * Convert a row from a database query into a new object of type Member
         */
        public static function FromRow($id, $name, $email, $monthly, $breaking, $delete)
        {
            $member = new static($id, $name, $email, $monthly, $breaking, $delete);
            return $member;
        }

        /** 
         * GetMember
         * Query the Database for the member with a matching email and name
         * */   
        public static function GetMember($conn, $email, $name)
        {
            $sqlQuery = "SELECT * FROM member WHERE email='$email' AND name='$name'";
            $stmt = $conn->prepare($sqlQuery);  //  Saying conn is undefined, but it should be accessible
            $stmt->execute();

            //  Create New Member Object
            while ($row = $stmt->fetch(PDO::FETCH_BOTH))
            {
                $id = $row['id'];
                $name = $row['name'];
                $email = $row['email'];

                $monthly = $row['monthlyNews'];
                $breaking = $row['breakingNews'];
                $delete = $row['deleteRequest'];

                return $member = member::FromRow($id, $name, $email, $monthly, $breaking, $delete);            
            }

        }

        /**
         * Update Member
         * Update Member in database where email in member object matches the email in the database
         * UPDATE NAME UNNECESARY
         */
        public function UpdateMember($conn)
        {
            $data = [
                'email' => $this->email,
                'monthlyNews' => $this->monthlyNews,
                'breakingNews' => $this->breakingNews,
                'deleteRequest' => $this->deleteRequest, 
            ];
            
            $query = "UPDATE member SET monthlyNews=:monthlyNews, breakingNews=:breakingNews, deleteRequest=:deleteRequest WHERE email=:email";
            $stmt = $conn->prepare($query);
            $stmt->execute($data);
        }

        public static function ConvertCheckbox($checked){
            if($checked == '1'){
            echo "<td scope = 'row'>
                <input type='checkbox' disabled checked >
            </td>";
            }
            else{
            echo "<td scope = 'row'>
                <input type='checkbox' disabled >
            </td>";
            }
        }
    }
