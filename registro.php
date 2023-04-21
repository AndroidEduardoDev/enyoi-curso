<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biblioteca";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO autor (nombre, apellido)
VALUES ('".$_POST["nombre"]."', '".$_POST["apellido"]."')";

if ($conn->query($sql) === TRUE) {
    $sql = "SELECT id, nombre, apellido FROM autor";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["nombre"]. " " . $row["apellido"]. "<br>";
      }
    }
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>