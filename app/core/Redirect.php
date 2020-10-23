<?php 

class Redirect {
    public static function to($string){
        header('Location: ' . BASEURL . $string);
        exit;
    }
}

?>