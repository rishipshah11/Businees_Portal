<?php

session_start();

unset($_SESSION['idea_id']);
unset($_SESSION['title']);
unset($_SESSION['duration']);
unset($_SESSION['price']);
unset($_SESSION['inn_id']);

header('location:view_idea.php');



?>