<?php 

class Authorize {

    public static function check()
    {
        if ($_SESSION["auth"] == NULL) {
            Flasher::setFlash("Login terlebih dahulu sebelum melanjutkan.", "danger");
            Redirect::to("/login");
        }
    }

    public static function isLogin()
    {
        return isset($_SESSION["auth"]) != NULL ? true : false;
    }

    public static function checkAdmin()
    {
        Authorize::check();
        if ($_SESSION["auth"]["role"] != "Admin") {
            Flasher::setFlash("Mohon maaf anda bukan Admin.", "danger");
            Redirect::to("/login");
        }
    }

    public static function isAdmin()
    {
        return $_SESSION["auth"]["role"] == "Admin" ? true : false;
    }

    public static function checkUser()
    {
        Authorize::check();
        if ($_SESSION["auth"]["role"] != "User") {
            Flasher::setFlash("Mohon maaf anda bukan Karyawan.", "danger");
            Redirect::to("/login");
        }
    }

    public static function isUser()
    {
        return $_SESSION["auth"]["role"] == "User" ? true : false;
    }
}

?>