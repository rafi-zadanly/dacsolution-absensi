<?php 

class OlderValues {
    public static function set($key, $data)
    {
        $_SESSION['old'][$key] = $data;
    }

    public static function get($key)
    {
        if( isset($_SESSION['old'][$key]) ) {
            $data = $_SESSION['old'][$key];
            unset($_SESSION['old'][$key]);
            return $data;
        }
    }
}