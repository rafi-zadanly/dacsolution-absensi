<?php 

class Authorize {

    public static function check()
    {
        if ($_SESSION["auth"] == NULL) {
            Flasher::setFlash("Login terlebih dahulu sebelum melanjutkan.", "danger");
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

    public static function checkAdmin()
    {
        if ($_SESSION["auth"]["role"] != "Admin") {
            Flasher::setFlash("Mohon maaf anda bukan Admin.", "danger");
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

    public static function isAdmin()
    {
        return $_SESSION["auth"]["role"] == "Admin" ? true : false;
    }

    public static function checkUser()
    {
        if ($_SESSION["auth"]["role"] != "User") {
            Flasher::setFlash("Mohon maaf anda bukan Karyawan.", "danger");
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

    public static function isUser()
    {
        return $_SESSION["auth"]["role"] == "User" ? true : false;
    }
}

?>