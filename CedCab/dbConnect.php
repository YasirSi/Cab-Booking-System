<?php
    //--------------Making AND Check Connection using PHP OOP--------------- 

    class dbConnect
    {
        public $servername;
        public $username;
        public $password;
        public $dbname;

        public $connect;

        function __construct()
        {
            $this->connect = new mysqli('localhost', 'root', '', 'CabBooking');
            if($this->connect->connect_error)
            {
                die("Connection failed: " . $this->$connect->connect_error);
            }
        }
    }
?>
