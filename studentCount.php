<?php


if(!session_id())
  session_start();

  $servername = "db.cs.dal.ca";
  $username = "manuele";
  $password = "B00559291";
  $dbname = "manuele";

  $date = $_SESSION['date'];

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);


  // Check connection
  if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
  }
 $sql = "SELECT COUNT(*) AS Count FROM Student;";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $_SESSION["countNumberOfStudents"] = $row["Count"];
    }
} else {
     echo("Error description: " . mysqli_error($conn));
} 
$conn->close();
?>