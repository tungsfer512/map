<?php
class Post_vevent
{
  private $conn;
  private $table = 'vevent';

  // post properties
  public $id;
  public $id_vehicle;
  public $speed;
  public $angle;
  public $odometer;
  public $enginehours;
  public $altitude;
  public $timeposition;
  public $timeserver;
  public $latitude;
  public $longitude;
  public $error_title;

  public function __construct($db)
  {
    $this->conn = $db;
  }
  // Get Post
  public function read()
  {
    // Create query
    $query = 'SELECT id, id_vehicle, speed, angle, odometer, enginehours, altitude, timeposition, timeserver, latitude, longitude, error_title FROM ' . $this->table;
    // prepare statement
    $stmt = $this->conn->prepare($query);
    // Excute query
    $stmt->execute();
    return $stmt;
  }
}
?>