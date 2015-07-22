<?php
$username = isset($_POST['username']) ? strtolower ($_POST['username']) == 'remington' : '';
$password = isset($_POST['password']) ? $_POST['password'] == '1992': '';

if($username && $password ){
	$authorized = 'you are authorized';
}else{
	$authorized = 'you are not authorized';
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>POST Example</title>
</head>
<body>
    
    <h2>Authorized to enter?</h2>
    <p><?php echo $authorized; ?></p>
    <a href="login.php">Back</a>
</body>
</html>