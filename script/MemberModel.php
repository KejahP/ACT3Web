<?php
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
                return "checked='checked'";
            }
            else
            {
                return 0;
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
                $monthly = 0;
                $breaking = 0;
                $delete = 0;

                if($row['monthlyNews'] == 1)
                {
                    $monthly = 1;
                }
                if($row['breakingNews'] == 1)
                {
                    $breaking = 1;
                }
                if($row['deleteRequest'] == 1)
                {
                    $delete = 1;
                }

                return $member = member::FromRow($id, $name, $email, $monthly, $breaking, $delete);            
            }

            //return $member;
        }

        /**
         * Update Member
         * Update Member in database where email in member object matches the email in the database
         */
        public function UpdateMember($conn)
        {
            $data = [
                'email' => $this->email,
                'name' => $this->name,
                'monthlyNews' => $this->monthlyNews,
                'breakingNews' => $this->breakingNews,
                'deleteRequest' => $this->deleteRequest, 
            ];
            
            $query = "UPDATE member SET name=:name, monthlyNews=:monthlyNews, breakingNews=:breakingNews, deleteRequest=:deleteRequest WHERE email=:email";
            $stmt = $conn->prepare($query);
            $stmt->execute($data);
        }
    }
    ?>