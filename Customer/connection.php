<?php 

$con = new mysqli("localhost","root","","oibp");
$er = $con->connect_errno;
if ($er != 0) {
	echo $con->connect_error;
	exit();
}

?>