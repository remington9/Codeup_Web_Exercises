<?php

require_once '../Auth.php';
require_once '../Input.php';
require_once 'functions.php';
session_start();

$username = Input::get('username') && escape($_REQUEST['username'] == 'guest');
$password = Input::get('password') && escape($_REQUEST['password'] == 'password');
$userinfo = false;
$header = "Welcome please login!";
if ($_POST){
        if (Auth::attempt(Input::get("username"), Input::get('password'))){
            echo "Test";
            header("Location: authorized.php");
            exit();
        }else{
            $header = "Please enter valid credentials.";
        }
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
        .box{
            width:15%;
            margin-right: auto;
            margin-left: auto;
        }
    </style>
</head>
<body>
    <h1><?= $header ?></h1>
    <div class="box">
        <form method="POST">
            <label>Userame:</label>
            <input type="text" name="username"><br><br>
            <label>Password:</label>
            <input type="password" name="password"><br><br>
            <input type="submit" style="float: right;">
        </form>
    </div>
</body>
</html>