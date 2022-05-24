<?php
    class Post_driver{
        private $conn;
        private $table = 'driver';
        
        // post properties
        public $id;
        public $fullname;
        public $addresses;
        public $phone;
        public $gender;
        public $birth;
        public $images;
        public $statuses;
        // public $created_at;

        public function __construct($db){
            $this->conn = $db;
        }
        // Get Post
        public function read(){
            // Create query
            $query = 'SELECT id, fullname,addresses, phone, gender, birth, statuses FROM '.$this->table;
            // prepare statement
            $stmt = $this->conn->prepare($query);
            // Excute query
            $stmt->execute();
            return $stmt;
        }
        // Get Single Post
        public function read_single(){
            $query = 'SELECT id, fullname,addresses, phone, gender, birth,images, statuses FROM '
            .$this->table.' WHERE ID = ?';
            // prepare statement
            $stmt = $this->conn->prepare($query);
            // bind id
            $stmt->bindParam(1, $this->id);

            // Excute query
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // set properties
            $this->id = $row['id'];
            $this->fullname = $row['fullname'];
            $this->addresses = $row['addresses'];
            $this->phone = $row['phone'];
            $this->gender = $row['gender'];
            $this->birth = $row['birth'];
            $this->images = $row['images'];
            $this->statuses = $row['statuses'];
        }
        // create

        public function create(){
            $query = 'INSERT INTO '.$this->table.' ';
        }

        // update post
        public function update()
        {
            $query = 'UPDATE ' . $this->table . '  
            SET fullname=:fullname,addresses=:address,phone=:phone,gender=:gender,birth=:birth,statuses=:status 
            WHERE id=:id';
            // ,images=:images
            // prepare
            $stmt = $this->conn->prepare($query);
    
            // clean data current
            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->fullname = htmlspecialchars(strip_tags($this->fullname));
            $this->addresses = htmlspecialchars(strip_tags($this->addresses));
            $this->phone = htmlspecialchars(strip_tags($this->phone));
            $this->gender = htmlspecialchars(strip_tags($this->gender));
            $this->birth = htmlspecialchars(strip_tags($this->birth));
            
            $this->statuses = htmlspecialchars(strip_tags($this->statuses));
            // bind data
    
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':fullname', $this->fullname);
            $stmt->bindParam(':address', $this->addresses);
            $stmt->bindParam(':phone', $this->phone);
            $stmt->bindParam(':gender', $this->gender);
            $stmt->bindParam(':birth', $this->birth);
            $stmt->bindParam(':status', $this->statuses);
    
            // excute
            if ($stmt->execute()) {
                return true;
            }
            printf("Error: %s.\n", $stmt->error);
            return false;
        }
        function update_img()
        {
            $query = "UPDATE driver SET IMAGES=:images
            WHERE ID =:id";
            $stmt = $this->conn->prepare($query);
            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->images = htmlspecialchars(strip_tags($this->images));
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':images', $this->images);
            if ($stmt->execute()) {
                return true;
            }
            printf("Error: %s.\n", $stmt->error);
            return false;
        }
        // Delete post
        public function delete()
        {
            $query = 'DELETE FROM ' . $this->table . ' WHERE ' . $this->table . '.id = :id';
            $stmt = $this->conn->prepare($query);
            $this->id = htmlspecialchars(strip_tags($this->id));
            $stmt->bindParam(':id', $this->id);
            if ($stmt->execute()) {
                return true;
            }
            printf("Error: %s.\n", $stmt->error);
            return false;
        }
    }