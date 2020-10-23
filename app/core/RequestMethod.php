<?php 

class RequestMethod {
    public static function is($method){
        if ($_SERVER['REQUEST_METHOD'] === $method) {
            return true;
        }
        return false;
    }
}

?>