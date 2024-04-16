<?php  

include'connection.php';
session_start();

$get_id = $_GET['id'];

$delete = $obj->query("delete from idea where in_id = '$get_id' ");

if($delete){
	header('location: http://localhost/oibp/Innovators/all_idea.php');
}
else{
	echo "<script>Error</script>";
}

?>