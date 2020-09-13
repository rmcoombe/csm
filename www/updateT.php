<?php
$var_value = $_GET['varname'];
$day = $_GET['day'];
$temp = $_GET['temp'];



$host = "localhost";
$user = "root";
$pass = "";
$db = "testing";
 
$conn = mysqli_connect($host,$user,$pass, $db);
if(!$conn)
{
  die("Connection failed: " . mysqli_connect_error());
}
 

// Attempt update query execution
$sql = "UPDATE tbl_employee SET $day ='$temp' WHERE EmployeeID='$var_value'";
if(mysqli_query($conn, $sql)){
    header("Location:update.php?varname=$var_value");
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
?>

