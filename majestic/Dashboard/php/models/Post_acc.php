<?php
    class Post_acc {
        private $conn;
        private $table = 'account';
        
        // post properties
        public $id;
        public $username;
        public $password;
        public $fullname;

        public function __construct($db){
            $this->conn = $db;
        }
        // Get Post
        public function read(){
            // Create query
            $query = 'SELECT id, username, password, fullname FROM '.$this->table;
            // prepare statement
            $stmt = $this->conn->prepare($query);
            // Excute query
            $stmt->execute();
            return $stmt;
        }
        // Get Single Post
        public function read_single(){
            $query = 'SELECT id, username, password, fullname FROM '.$this->table.' WHERE username = ? and password = ?';
            // prepare statement
            $stmt = $this->conn->prepare($query);
            // bind id
            $stmt->bindParam(1, $this->username);
            $stmt->bindParam(2,$this->password);
            // Excute query
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // set properties
            $this->id = $row['id'];
            $this->username = $row['username'];
            $this->password = $row['password'];
            $this->fullname = $row['fullname'];
        }
    }