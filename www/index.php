<?php 
session_start()
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
 <br>
 <h1> Welcom to Crew Scan</h1>
 <p>Here you can search for a crewmember to see their data and update their daily temperature reading</p>
 <p>Input their CrewID and tap search or press the QR code image to use the scanner</p> 
<div align="center"> 
 <p>Crew ID</p>
<form method="get" action="update.php">
    <input type="text" id="varname" name="varname" ></br></br>
    <button type="submit">Search</button>
</form>
</div>

<img src="img/QRImage.png" onclick="crewScan()" class="w3-display-bottommiddle" alt="scan_image">

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

function eventFire(el, etype){
  if (el.fireEvent) {
    el.fireEvent('on' + etype);
  } else {
    var evObj = document.createEvent('Events');
    evObj.initEvent(etype, true, false);
    el.dispatchEvent(evObj);
  }
}



</script>


</html>
