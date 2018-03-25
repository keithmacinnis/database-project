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
 
 $sql = "SELECT COUNT(*) AS bCount FROM Student WHERE MONTH(Student.Registration_Date)=MONTH('2018-01-15');";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $_SESSION["janStat"] = $row["bCount"];
    }
} else {
     echo("Error description: " . mysqli_error($conn));
} 
 $sql = "Select COUNT(*) as bCount From Student where Month(Student.Registration_Date)=Month('2018-02-15');";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        $_SESSION["febStat"] = $row["bCount"];

    }
} else {
    echo "Error <br>";
} $sql = "Select COUNT(*) as bCount From Student where Month(Student.Registration_Date)=Month('2018-03-15');";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $_SESSION["marchStat"] = $row["bCount"];
    }
} else {
    echo "Error <br>";
} $sql = "Select COUNT(*) as bCount From Student where Month(Student.Registration_Date)=Month('2018-04-15');";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $_SESSION["aprilStat"] = $row["bCount"];
    }
} else {
    echo "Error <br>";
} 
$conn->close();
?>