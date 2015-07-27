<?php

session_start();
require_once '../Auth.php';
require_once '../Input.php';

if (Auth::check()) {
    $username = Auth::user();
} else {
    header("Location: login.php");
    exit();
}   
?>
<!DOCTYPE html>
<html>
<head>
    <title>POST Example</title>
    <style type="text/css">
        body {
            text-align: center;
		}
    </style>
</head>
<body>
    
    <h2>You are authorized to enter</h2>
    <p>Welcome <?= $username?> please enjoy our page!</p>
    <a href="logout.php">Logout</a>
</body>
</html>