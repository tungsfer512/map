<?php
class Post
{
    private $conn;
    private $table = 'vehicle';

    // post properties
    public $vehicle_id;
    public $bin_id;
    public $bin_address;
    public $driver_fullname;
    public $driver_id;
    // public $created_at;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    // Get Post
    public function read()
    {
        // Create query
        $query = 'SELECT vehicle.ID as vehicle_id,bin.id as bin_id,bin.ADDRESSES as bin_address,driver.FULLNAME as driver_fullname,driver.ID as driver_id  from task
            inner join vehicle on vehicle.ID = task.ID_VEHICLE
            INNER JOIN bin on bin.ID = task.ID_BIN
            inner join drivervehicle on drivervehicle.ID_VEHICLE = vehicle.ID
            inner join driver on driver.id = drivervehicle.ID_DRIVER;';
        // prepare statement
        $stmt = $this->conn->prepare($query);
        // Excute query
        $stmt->execute();
        return $stmt;
    }
    // Get Single Post
    public function read_single()
    {
        $query = 'SELECT vehicle.ID as vehicle_id,bin.id as bin_id,bin.ADDRESSES as bin_address,driver.FULLNAME as driver_fullname,driver.ID as driver_id  from task
            inner join vehicle on vehicle.ID = task.ID_VEHICLE
            INNER JOIN bin on bin.ID = task.ID_BIN
            inner join drivervehicle on drivervehicle.ID_VEHICLE = vehicle.ID
            inner join driver on driver.id = drivervehicle.ID_DRIVER;
            WHERE vehicle.ID = ?
            ';
        // prepare statement
        $stmt = $this->conn->prepare($query);
        // bind id
        $stmt->bindParam(1, $this->vehicle_id);

        // Excute query
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set properties
        $this->bin_id = $row['bin_id'];
        $this->bin_address = $row['bin_address'];
        $this->driver_fullname = $row['driver_fullname'];
        $this->driver_id = $row['driver_id'];
    }
    // create

    public function create()
    {

    }

    // update post
    public function update()
    {
        $query = 'UPDATE ' . $this->table . ' SET';

    }
    // Delete post
    public function delete()
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE ' . $this->table . '.id = :id';

    }
}
