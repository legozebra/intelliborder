<?php
/**
* @author Christopher L.
* M755a CS3, Section A
* Final Project
* IntelliBoundary
*
* PHP script for travel journal tracking - database entry
*
* intellilatest.php
* @version  1.0
* @since May 20,2016
* May 22, 2016
*/

$servername  = "localhost";
$dbname      = "probe";
$tablename   = "intellib";

// define variables and set to known values
$username  = "fakeusername";
$password  = "fakepassword";
$datevalue = "2016-01-01 12:12:12";
$latitude  = 0.0;
$longitude = 0.0;


$username      = $_GET['username'];
$password      = $_GET['password'];
$uuid          = $_GET['uuid'];



$conn = openConnection($username,$password,$dbname);

$query = "SELECT uuid, date, latitude, longitude FROM  $tablename WHERE uuid = $uuid ORDER BY date DESC LIMIT 1";


$result = $conn->query($query);

if ($result->num_rows > 0) {
        // retrieve each record
        while ($row = $result->fetch_assoc()) {
                echo "uuid:".$row["uuid"].",date:".$row["date"].",latitude:".$row["latitude"].",longitude:".$row["longitude"]."<br>";
        }
} else {
        echo "none:";
}


$conn->close();


  function openConnection($username, $password, $dbname) {
    // To protect MySQL injection (more detail about MySQL injection)
    $username  = stripslashes($username);
    $password  = stripslashes($password);
    $uuid      = stripslashes($uuid);

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: ".$conn->connect_error)."<br>";
    }
    else {
        echo "Connected successfully<br><br>";
    };

    return $conn;
  }
?>