<?php
require_once '../Log.php';
class Auth
{
    public static $password = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';
    
    public static function attempt ($username, $password){
            $log = new Log;
        if ($username == 'guest' && password_verify($password, self::$password)){
            $_SESSION['LOGGED_IN_USER'] = $username;
            $log->info("User {$username} is logged in.");
            return true;
        } else {
            $log->error("Username: {$username} and/or password not found! Please try again.");
            return false;
        }
    }
    public static function check (){
        return isset($_SESSION['LOGGED_IN_USER']) ? true : false;
    }
    public static function user (){
        return isset($_SESSION['LOGGED_IN_USER']) ? $_SESSION['LOGGED_IN_USER'] : null;
    }
    public static function logout (){
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
        header("Location: login.php");
        exit();
    }
}