<?php
session_start();
require 'functions.php';
// get the current session id
$sessionId = session_id();

if(!empty($_SESSION['userinfo'])){
	$name = escape($_SESSION['userinfo']);
}else{
	header("Location: login.php");
	exit();
}
require 'functions.php';

?>
<!DOCTYPE html>
<html>
<head>
    <title>POST Example</title>
</head>
<body>
    
    <h2>You are authorized to enter</h2>
    <p>Welcome! <?= $name?></p>
    <a href="logout.php">Logout</a>
</body>
</html>