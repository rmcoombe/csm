<?php
$var_value = $_GET['varname'];


$host = "localhost";
$user = "root";
$pass = "";
$db = "testing";
 
$conn = mysqli_connect($host,$user,$pass, $db);
if(!$conn)
{
  die("Connection failed: " . mysqli_connect_error());
}
 
?>
 
<?php 
  error_reporting(0);
  $sql = "select * from tbl_employee where EmployeeID =  $var_value ";
  $rs = mysqli_query($conn, $sql);
  $fetchRow = mysqli_fetch_assoc($rs);

?> 
 

<!DOCTYPE html>
<html lang="en">
<title>NIO Tyre App</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="sweetalert-master/dist/sweetalert.min.js"></script>
<script src="https://api.backendless.com/sdk/js/latest/backendless.min.js"></script>
<script src="js/Chart.js" type="text/javascript"></script>
<script src="js/index.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>


<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}
  td {
  padding: 5px;
  height: 30px;
  vertical-align: center;
  text-align: Center;
}
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-blue-grey w3-card w3-left-align w3-small">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-left w3-padding-large w3-hover-white w3-large w3-blue-grey" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-blue-grey"><i class="fa fa-home fa-2x w3-padding-10 w3-text-white"></i></a>
    <a href="reports.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Reports</a>
    <a href="settings.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Settings</a>

  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="reports.html" class="w3-bar-item w3-button w3-padding-large">Reports</a>
    <a href="settings.html" class="w3-bar-item w3-button w3-padding-large">Settings</a>

  </div>
</div>
 <br>
 <br>
 <h3>Crewmember Info</h3>
  <p><i>Name:&nbsp </i><?php echo $fetchRow['name']?></p>
  <p><i>Team:&nbsp </i><?php echo $fetchRow['Team']?></p>
  <p><i>Supervisor:&nbsp </i><?php echo $fetchRow['Supervisor']?></p>
  <p id="dotw" hidden="true"></p>
  <p id="EmployeeID" hidden="true"><?php echo $fetchRow['EmployeeID']?></p>
  
  <h3>Last 7 Days</h3>
  <table id="table" style="width:100%">
  <tr>
    <th>Mon</th>
    <th>Tue</th>
    <th>Wed</th>
    <th>Thu</th>
    <th>Fri</th>
    <th>Sat</th>
    <th>Sun</th>    
  </tr>
  <tr>
    <td><?php echo $fetchRow['MonT']?></td>
    <td><?php echo $fetchRow['TueT']?></td>
    <td><?php echo $fetchRow['WedT']?></td>
    <td><?php echo $fetchRow['ThuT']?></td>
    <td><?php echo $fetchRow['FriT']?></td>
    <td><?php echo $fetchRow['SatT']?></td>
    <td><?php echo $fetchRow['SunT']?></td>
  </tr>
</table>

<canvas id="myChart" width="100%"></canvas>


<form method="get" action="updateT.php">
    <input type="text" id="user" name="varname" hidden="true" >
    <h6>Add Scan Temp and Press Submit</h6>
    <input type="number" step="0.1" max="45" id="temp" name="temp">
    <input type="text" id="day" name="day" hidden="true"><br>
    <button type="submit"  name="update" value="Update">Update</button>
</form>


</body>
<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}

window.onload = function exampleFunction() { 
  var d = new Date();
  var weekday = new Array(7);
      weekday[0] = "SunT";
      weekday[1] = "MonT";
      weekday[2] = "TueT";
      weekday[3] = "WedT";
      weekday[4] = "ThuT";
      weekday[5] = "FriT";
      weekday[6] = "SatT";

  var n = weekday[d.getDay()];
  var t = document.getElementById("EmployeeID").innerHTML;
  document.getElementById("dotw").innerHTML=n;
  document.getElementById("day").value=n;
  document.getElementById("user").value=t;

} 

var ctx = document.getElementById('myChart').getContext('2d');
var days = ["Mon","Tue","Wed","Thu","Fri","Sat","Sun"];
var temperature = [<?php echo $fetchRow['MonT']?>,<?php echo $fetchRow['TueT']?>,<?php echo $fetchRow['WedT']?>,<?php echo $fetchRow['ThuT']?>,<?php echo $fetchRow['FriT']?>,<?php echo $fetchRow['SatT']?>,<?php echo $fetchRow['SunT']?>];
var myChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels:days,
    datasets: [
      { 
        data: temperature,
        label:"Temperature C",
        borderColor: "#3e95cd",
        fill: false

      }
    ]
  },
      options: {
        scales: {
            yAxes: [{
                ticks: {
                    suggestedMin: 33,
                    suggestedMax: 40
                }
            }]
        }
    }
});


</script>

<?php 
  error_reporting(0);
  $sql = "select * from tbl_employee where EmployeeID =  $var_value ";
  $rs = mysqli_query($conn, $sql);
  if(mysqli_num_rows($rs)>0){
  $fetchRow = mysqli_fetch_assoc($rs);
  } else{echo '<script>swal("Ooops!", "No record was found for that crew member. Please check the ID and try again.");</script>';}
        

?> 


</html>
