<?php

function OpenCon()
 {
 
 $conn = new mysqli('localhost', 'id8989599_theodoinhietdo','0905751021','id8989599_theodoinhietdo') or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
		
?>