<?php

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
echo "<br><br>";

echo "Before Insertion of new data: <br><br>";

$sql = "SELECT * FROM USER";
$result = $conn->query($sql);

if($result->num_rows >0){
   while($row = $result->fetch_assoc()){
      echo "ID: " . $row["UID"]. " - Name: ". $row["Name"]. "<br>";
   }
} else {
   echo "0 results <br>";
}

//prepare and bind new values
$stmt = $conn->prepare("INSERT INTO USER(UID, Name) VALUES (?, ?)");
$UID = $_POST['UID'];
$Name = $_POST['Name'];

echo "<br>After insertion of new data: <br><br>";

$stmt->bind_param("is", $UID, $Name);

$stmt->execute();

$result2 = $conn->query($sql);
if($result2->num_rows >0){
   while($row2 = $result2->fetch_assoc()){
      echo "ID: " . $row2["UID"]. " - Name: ". $row2["Name"]. "<br>";
   }
} else {
   echo "0 results";
}

$stmt->close();

$conn->close();

?>
