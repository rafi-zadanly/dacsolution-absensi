<?php 

class Home extends Controller {
    public function index()
    {
        $this->view("home/index");
    }

    public function time_now()
    {
        date_default_timezone_set("Asia/Jakarta");
        echo date("H:i:s");
    }
}