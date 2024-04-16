<?php
$obj=new mysqli("localhost","root","","oibp");
$errno=$obj->connect_errno;
if($errno != 0)
{
	echo $obj->connect_error;
	exit;
}
?>