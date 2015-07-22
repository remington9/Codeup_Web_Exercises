<?php

session_start();

$username = isset($_POST['username']) && strtolower($_POST['username']) == 'remington';
$password = isset($_POST['password']) && $_POST['password'] == '1992';
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