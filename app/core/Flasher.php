<?php 

class Flasher {
    public static function setFlash($message, $type)
    {
        $_SESSION['flash'] = [
            'message' => $message,
            'type'  => $type
        ];
    }

    public static function flash()
    {
        if( isset($_SESSION['flash']) ) {
            $flash = '<div class="notification bg-' . $_SESSION['flash']['type'] . ' text-light text-center p-3 rounded">';
            $flash .= $_SESSION['flash']['message'];
            $flash .= '</div>';
            echo $flash;
            unset($_SESSION['flash']);
        }
    }
}