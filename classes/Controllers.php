<?php
    require_once "DatabaseController.php";
    require_once "MemberController.php";
    require_once "ProductController.php";
    require_once "ReviewController.php"; 

    class Controllers {

        protected $db = null;
        protected $members = null;
        protected $products = null;
        protected $reviews = null;

        public function __construct()
        {
            //----TEMP----//

            $type ='mysql';
            $server = '127.0.0.1';
            $db = 'broadleigh_db';
            $port = '3306';
            $charset = 'latin1';
            $username = 'root';
            $password = '';
        
            //----TEMP----//

            $dsn = "$type:host=$server;dbname=$db;port=$port;charset=$charset";
        
            try {
                $this->db = new DatabaseController($dsn, $username, $password); 
            }
            catch (PDOException $e) {
                throw new PDOException($e -> getMessage(), $e -> getCode());
                echo $echo;
            }
        }

        public function members()
        {
            if ($this->members === null) {
                $this->members = new MemberController($this->db);
            }
            return $this->members;
        }

        public function products()
        {
            if ($this->products === null) {
                $this->products = new ProductController($this->db);
            }
            return $this->products;
        }
        public function reviews() { // Add this method
            if ($this->reviews === null) {
                $this->reviews = new ReviewController($this->db);
            }
            return $this->reviews;
        }
    }
?>