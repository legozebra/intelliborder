<?php
/**
* @author Christopher L.
* M755a CS3, Section A
* Final Project
* IntelliBoundary
*
* PHP script for travel journal tracking - database query
*
* intelliquery.php
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


$username      = $_GET['uname'];
$password      = $_GET['pwd'];
$uuid          = $_GET['uuid'];

// echo "Got Data Successfully as below <br>";
// echo "Username   ".$username."<br>";
// echo "Password   ".$password."<br>";
// echo "UUID       ".$uuid."<br>";

$conn = openConnection($username,$password,$dbname);

// $stmt = buildQuery($uuid);

$query = "SELECT uuid, date, latitude, longitude FROM  $tablename WHERE uuid = $uuid;";

// echo "Query: ".$query."<br>";

$result = $conn->query($query);

if ($result->num_rows > 0) {
        // retrieve each record
        while ($row = $result->fetch_assoc()) {
                echo "uuid:".$row["uuid"].",date:".$row["date"].",latitude:".$row["latitude"].",longitude:".$row["longitude"]."<br>";
        }
} else {
        echo "none:";
}

// $result = $conn->query($query);

// retrieveRecords($stmt);

// $result->close();
$conn->close();


  function openConnection($username, $password, $dbname) {
    // To protect MySQL injection (more detail about MySQL injection)
    $username  = stripslashes($username);
    $password  = stripslashes($password);
    $uuid      = stripslashes($uuid);
    // $username = $conn->real_escape_string($username);
    // $password = $conn->real_escape_string($password);    // Create connection
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
/*
  function buildQuery($uuid) {
    if ($stmt = $conn->prepare("SELECT uuid, date, latitude, longitude FROM  $tablename WHERE uuid = ?;")) {
        $stmt->bind_param('i', $uuid);
        if ($stmt->execute()) {
                echo "Successful QUERY<br>";
        }
        else {
                echo "Failed QUERY<br>";
        }
    }
    return $stmt;
  }



  function retrieveRecords($stmt) {
    if ($stmt->num_rows > 0) {
        // output each row of data
        while ($row = $stmt->fetch_assoc()) {
            echo "uuid:"$row["uuid"].",date:".$row["date"].",latitude:".$row["latitude"].",longitude:".$row["longitude"]."<br>";
        }
    }
    else {
        echo "none:<br>"
    }
  }
*/
?>
leemikes@leelamp01:/var/www/html$
