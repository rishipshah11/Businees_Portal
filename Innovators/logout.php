<?php
session_start();

session_destroy();

header('location: http://localhost/oibp/Customer/index.php');


?>