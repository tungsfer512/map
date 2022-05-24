<?php
    class Post_bin{
        private $conn;
        private $table = 'bin';
        
        // post properties
        public $id;
        public $createddate;
        public $owners;
        public $names;
        public $weights;
        public $height;
        public $latitude;
        public $longitude;
        public $statuses;
        public $addresses;
        
        // public $created_at;

        public function __construct($db){
            $this->conn = $db;
        }
        // Get Post
        public function read(){
            // Create query
            $query = 'SELECT id, createddate,owners, latitude, longitude, statuses,addresses FROM '.$this->table;
            // prepare statement
            $stmt = $this->conn->prepare($query);
            // Excute query
            $stmt->execute();
            return $stmt;
        }
        // Get Single Post
        public function read_single(){
            $query = 'SELECT id, createddate,owners,names,weights,height, latitude, longitude, statuses,addresses FROM '.$this->table.' WHERE ID = ?';
            // prepare statement
            $stmt = $this->conn->prepare($query);
            // bind id
            $stmt->bindParam(1, $this->id);

            // Excute query
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // set properties
            $this->id = $row['id'];
            $this->createddate = $row['createddate'];
            $this->owners = $row['owners'];
            $this->names = $row['names'];
            $this->weights= $row['weights'];
            $this->height= $row['height'];
            $this->latitude = $row['latitude'];
            $this->longitude = $row['longitude'];
            $this->statuses = $row['statuses'];
            $this->addresses = $row['addresses'];
        }
        // create

        public function create(){
            $query = 'INSERT INTO '.$this->table.' ';
        }

        // update post
    public function update()
    {
        $query =
            'UPDATE ' . $this->table . ' 
            SET  CREATEDDATE =:createddate, OWNERS =:owners, 
            NAMES =:names, WEIGHTS =:weights, HEIGHT =:height,LATITUDE=:lat,LONGITUDE=:long,ADDRESSES=:address 
            WHERE ID=:id';
        $stmt = $this->conn->prepare($query);
        // clean data
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->createddate = htmlspecialchars(strip_tags($this->createddate));
        $this->owners = htmlspecialchars(strip_tags($this->owners));
        $this->names = htmlspecialchars(strip_tags($this->names));
        $this->weights = htmlspecialchars(strip_tags($this->weights));
        $this->height = htmlspecialchars(strip_tags($this->height));
        $this->latitude = htmlspecialchars(strip_tags($this->latitude));
        $this->longitude = htmlspecialchars(strip_tags($this->longitude));
        $this->addresses = htmlspecialchars(strip_tags($this->addresses));
        // bin data
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':createddate', $this->createddate);
        $stmt->bindParam(':owners', $this->owners);
        $stmt->bindParam(':names', $this->names);
        $stmt->bindParam(':weights', $this->weights);
        $stmt->bindParam(':height', $this->height);
        $stmt->bindParam(':lat', $this->latitude);
        $stmt->bindParam(':long', $this->longitude);
        $stmt->bindParam(':address', $this->addresses);

        // excute query
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