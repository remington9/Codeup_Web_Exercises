<?php

session_start();
require 'functions.php';

$username = inputHas('username') && escape($_REQUEST['username'] == 'remington');
$password = inputHas('password') && escape($_REQUEST['password'] == '1992');
$userinfo = false;
if (isset($_POST['username']) && isset($_POST['password'])) {
	if($username && $password){
        $_SESSION['userinfo'] = $_POST['username'];
		header("Location: authorized.php");
		exit();
	}else{
		echo 'you are not authorized to log in here';
	}
}
require 'functions.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>POST Example</title>
</head>
<body>
    <form method="POST">
        <label>Userame:</label>
        <input type="text" name="username"><br>
        <label>Password:</label>
        <input type="password" name="password"><br>
        <input type="submit">
    </form>
</body>
</html>