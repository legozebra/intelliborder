<?php
/**
* @author Christopher L.
* M755a CS3, Section A
* Final Project
* IntelliBoundary
*
* PHP script for travel journal tracking - database entry
*
* http://leelamp01.westus.cloudapp.azure.com/intelliquery.php?username=root&password=Password123%21&uuid=9876
*
* intellidelete.php
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
$uuid      = 0;

$username      = $_GET['uname'];
$password      = $_GET['pwd'];
$uuid          = $_GET['uuid'];

$conn = openConnection($username,$password,$dbname);

$query = "DELETE FROM  $tablename WHERE uuid = $uuid;";

$result = $conn->query($query);

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