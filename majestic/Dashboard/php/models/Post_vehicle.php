<?php
class Post_vehicle
{
    private $conn;
    private $table = 'vehicle';

    // post properties
    public $id;
    public $code;
    public $typed;
    public $license;
    public $imei;
    public $timestamps;
    public $latitude;
    public $longitude;
    public $weights;
    public $images;
    public $addresses;
    public $statuses;
    // public $created_at;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    // Get Post
    public function read()
    {
        // Create query
        $query = 'SELECT id, code, license, typed, addresses, statuses,latitude,longitude,images FROM ' . $this->table;
        // prepare statement
        $stmt = $this->conn->prepare($query);
        // Excute query
        $stmt->execute();
        return $stmt;
    }
    // Get Single Post
    public function read_single()
    {
        $query = 'SELECT id, code,typed ,license ,imei,timestamps, latitude,weights, longitude,statuses,images,addresses FROM ' . $this->table . ' WHERE vehicle.ID = ?';
        // prepare statement
        $stmt = $this->conn->prepare($query);
        // bind id
        $stmt->bindParam(1, $this->id);

        // Excute query
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set properties
        $this->id = $row['id'];
        $this->code = $row['code'];
        $this->typed = $row['typed'];
        $this->license = $row['license'];
        $this->imei = $row['imei'];
        $this->timestamps = $row['timestamps'];
        $this->latitude = $row['latitude'];
        $this->longitude = $row['longitude'];
        $this->weights= $row['weights'];
        $this->addresses = $row['addresses'];
        $this->images = $row['images'];
        $this->statuses = $row['statuses'];
    }
    // create

    public function create()
    {
        // $query = 'INSERT INTO ' . $this->table . ' SET id=:id, code=:code, typed=:typed, license=:license,imei=:imei,timestamps=NULL,latitude=:latitude,longitude=:longitude,weights=:weight,addresses=:addresses,images=:images,statuses=:statuses';
        //
        $query="INSERT INTO `vehicle` (`ID`, `CODE`, `TYPED`, `LICENSE`, `IMEI`, `TIMESTAMPS`, `LATITUDE`, `LONGITUDE`, `WEIGHTS`, `ADDRESSES`, `IMAGES`, `STATUSES`) VALUES (:id, :code, :typed, :license, :imei, NULL,:latitude, :longitude, weight, addresses, :images, statuses)";
        $stmt = $this->conn->prepare($query);

        // reset data
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->code = htmlspecialchars(strip_tags($this->code));
        $this->typed = htmlspecialchars(strip_tags($this->typed));
        $this->license = htmlspecialchars(strip_tags($this->license));
        $this->imei = htmlspecialchars(strip_tags($this->imei));
        // $this->timestamps = htmlspecialchars(strip_tags($this->timestamps));
        $this->latitude = htmlspecialchars(strip_tags($this->latitude));
        $this->longitude = htmlspecialchars(strip_tags($this->longitude));
        $this->weights = htmlspecialchars(strip_tags($this->weights));
        $this->addresses = htmlspecialchars(strip_tags($this->addresses));
        $this->images= htmlspecialchars(strip_tags($this->images));
        $this->statuses = htmlspecialchars(strip_tags($this->statuses));

        // bind data
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':code', $this->code);
        $stmt->bindParam(':typed', $this->typed);
        $stmt->bindParam('::license', $this->license);
        $stmt->bindParam(':imei',$this->imei);
        // $stmt->bindParam(':timestamps', $this->timestamps);
        $stmt->bindParam(':latitude', $this->latitude);
        $stmt->bindParam(':longitude', $this->longitude);
        $stmt->bindParam(':weight', $this->weights);
        $stmt->bindParam(':addresses', $this->addresses);
        $stmt->bindParam(':images', $this->images);
        $stmt->bindParam(':statuses', $this->statuses);

        if ($stmt->execute()) {
            return true;
        }
        printf("Error: %s\n", $stmt->error);
        return true;
    }

// update post
    public function update()
    {
        $query = "UPDATE vehicle
            SET code=:code,LICENSE=:license,TYPED=:typed,ADDRESSES =:addresses,STATUSES = :statuses, LATITUDE = :lat,IMEI=:imei, LONGITUDE = :long,weights=:weights,statuses=:status
            WHERE ID =:id";

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->code = htmlspecialchars(strip_tags($this->code));
        $this->license = htmlspecialchars(strip_tags($this->license));
        $this->typed = htmlspecialchars(strip_tags($this->typed));
        $this->addresses = htmlspecialchars(strip_tags($this->addresses));
        $this->imei = htmlspecialchars(strip_tags($this->imei));
        $this->statuses = htmlspecialchars(strip_tags($this->statuses));
        $this->latitude = htmlspecialchars(strip_tags($this->latitude));
        $this->longitude = htmlspecialchars(strip_tags($this->longitude));
        $this->weights = htmlspecialchars(strip_tags($this->weights));
        $this->statuses = htmlspecialchars(strip_tags($this->statuses));
        // Bind data
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':code', $this->code);
        $stmt->bindParam(':license', $this->license);
        $stmt->bindParam(':typed', $this->typed);
        $stmt->bindParam(':addresses', $this->addresses);
        $stmt->bindParam(':statuses', $this->statuses);
        $stmt->bindParam(':imei', $this->imei);
        $stmt->bindParam(':lat', $this->latitude);
        $stmt->bindParam(':long', $this->longitude);
        $stmt->bindParam(':weights', $this->weights);
        $stmt->bindParam(':status', $this->statuses);
        
        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;

    }
    
    function update_img()
    {
        $query = "UPDATE vehicle 
        SET IMAGES=:images
        WHERE ID =:id";
        // $this->id = 'HN7859';
        $stmt = $this->conn->prepare($query);
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
        if($stmt->execute()){
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function updateService(){
        $query = "UPDATE vehicle
        SET LATITUDE=:lat, LONGITUDE = :long
        WHERE ID =:id";
        // $this->id = 'HN7859';
        $stmt = $this->conn->prepare($query);
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->longitude = htmlspecialchars(strip_tags($this->longitude));
        $this->latitude = htmlspecialchars(strip_tags($this->latitude));

        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':lat', $this->latitude);
        $stmt->bindParam(':long', $this->longitude);
        
        if ($stmt->execute()) {
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }
}
