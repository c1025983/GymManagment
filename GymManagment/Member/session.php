<?php
class Session {
    public static function init() {
        // Checking if the PHP version is less than 5.4.0
        if (version_compare(phpversion(), '5.4.0', '<')) {
            // If session is not already started in older versions of PHP
            if (session_id() == '') {
                session_start();
            }
        } else {
            // For PHP 5.4.0 and above, using session_status()
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        }
    }

    public static function set($key, $val) {
        $_SESSION[$key] = $val;
    }

    public static function get($key) {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }
 
    public static function checkSession() {
        self::init();
        if (self::get("login") == false) {
            self::destroy();
            header("Location:login.php");
            exit(); // Ensure execution stops after redirection
        }
    }

    public static function checkLogin() {
        self::init();
        if (self::get("login") == true) {
            header("Location:index.php");
            exit(); // Ensure execution stops after redirection
        }
    }

    public static function destroy() {
        session_destroy();
        header("Location:login.php");
        exit(); // Ensure execution stops after redirection
    }
}
?>
