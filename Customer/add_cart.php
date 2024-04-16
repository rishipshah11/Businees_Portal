<?php

error_reporting(0);
session_start();

include 'connection.php'; 

$idea_id = $_GET['idea_id'];

$result = $con->query("SELECT * from idea WHERE id='$idea_id'");

$row = $result->fetch_object();



$_SESSION['idea_id'] = $row->id;
$_SESSION['title'] = $row->title;
$_SESSION['duration'] = $row->duration;
$_SESSION['price'] = $row->price;
$_SESSION['inn_id'] = $row->in_id;


header('location:shopping_cart.php');



?>