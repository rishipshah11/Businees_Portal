<?php
include'connection.php';
$id=$_GET['delid'];
$exe=$obj->query("delete from category where cat_id='$id'");
if($exe)
{
	header('location:all_cat.php');
}
else
{
	echo "something wrong";
}


?>