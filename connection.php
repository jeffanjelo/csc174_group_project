<?php
$UID = $_POST['ID'];
$Name = $_POST['Name'];

//insert database Credentials 
$servername = "ecs-pd-proj-db.ecs.csus.edu";
$username = "CSC174024";
$password = "Csc134_978475534";
$db = "CSC174024";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);
// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

//prepare and bind new values
$stmt = $conn->prepare("INSERT INTO USER(AID, Name) VALUES (?, ?)");

$stmt->bind_param("is", $UID, $Name);

$stmt->execute();

$stmt->close();


$conn->close();

?>
