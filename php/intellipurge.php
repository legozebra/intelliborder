<?php
/**
* @author Christopher L.
* M755a CS3, Section A
* Final Project
* IntelliBoundary
*
* PHP script for travel journal tracking - database entry
*
* intellipurge.php
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

$username      = $_GET['uname'];
$password      = $_GET['pwd'];

$conn = openConnection($username,$password,$dbname);

$query = "DELETE FROM  $tablename;";

$result = $conn->query($query);

$conn->close();


  function openConnection($username, $password, $dbname) {
    // To protect MySQL injection (more detail about MySQL injection)
    $username  = stripslashes($username);
    $password  = stripslashes($password);
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