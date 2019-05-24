<?php
include 'database.php';
// create a variable
$conn = OpenCon();

$temp = $_POST[ "temp" ];
$uv = $_POST[ "uv"];
$lat = $_POST[ 'lat' ];
$long = $_POST[ 'long' ];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$time=date('Y-m-d h:i:s', time());
//Execute the query
$sql = "INSERT INTO information VALUES('$time','$temp','$uv','$lat','$long')";
if(mysqli_query($conn,$sql ))
	echo "<p>Success</p>";
else {
	echo "Failed<br />";}
CloseCon($conn);

?>