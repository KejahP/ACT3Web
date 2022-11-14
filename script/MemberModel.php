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

        /**
         * FromRow
         * Convert a row from a database query into a new object of type Member
         */
        public static function FromRow($row)
        {
            $member = new static($row['id'], $row['name'], $row['email'], $row['monthlyNews'], $row['breakingNews'], $row['deleteRequest']);
            return $member;
        }

        /** 
         * GetMember
         * Query the Database for the member with a matching email and name
         * */   
        public static function GetMember($email, $name)
        {
            $sqlQuery = "SELECT * FROM members WHERE email='".$email."' AND name='".$name."'";
            $stmt = $conn->prepare($sqlQuery);  //  Saying conn is undefined, but it should be accessible
            $stmt->execute();
            $member = null;
            //  Create New Member Object
            while ($row = $stmt->fetch(PDO::FETCH_BOTH))
            {
                $member = member::FromRow($row);            
            }

            return $member;
        }
    }
    ?>