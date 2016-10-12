<?php
/**
* @author Christopher L.
* M755a CS3, Section A
* Final Project
* IntelliBoundary
*
* PHP script for travel journal tracking - database entry
*
* input.php
* @version  1.0
* @since May 18,2016
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


$username      = $_GET['uname'];
$password      = $_GET['pwd'];
$uuid          = $_GET['uuid'];
$datevalue     = $_GET['date'];
$latitude      = $_GET['lat'];
$longitude     = $_GET['lng'];

// To protect MySQL injection (more detail about MySQL injection)
$uuid      = stripslashes($uuid);
$datevalue = stripslashes($datevalue);
$latitude  = stripslashes($latitude);
$longitude = stripslashes($longitude);
// $username = $conn->real_escape_string($username);
// $password = $conn->real_escape_string($password);

echo "Got Data Successfully as below <br>";
echo "Username   ".$username."<br>";
echo "Password   ".$password."<br>";
echo "UUID       ".$uuid."<br>";
echo "Date       ".$datevalue."<br>";
echo "Latitude   ".$latitude."<br>";
echo "Longitude  ".$longitude."<br><br>";


$conn = openConnection($servername,$username,$password,$dbname);

$stmt = $conn->prepare("INSERT INTO $tablename (uuid, date, latitude, longitude) VALUES (?, ?, ?, ?);");
$stmt->bind_param('isdd', $uuid, $datevalue, $latitude, $longitude);

if ($stmt->execute()) {
    echo "Successful INSERT<br>";
}
else {
    echo "Failed INSERT<br>";
}
$stmt->close();
$conn->close();

  function openConnection($servername,$username,$password,$dbname) {
        // To protect MySQL injection (more detail about MySQL injection)
        $username  = stripslashes($username);
        $password  = stripslashes($password);

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
                die("Connection failed: ".$conn->connect_error)."<br>";
        }
        else {
                echo "Connected successfully<br>";
        };

        return $conn;
  }
?>