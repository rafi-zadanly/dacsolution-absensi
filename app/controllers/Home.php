<?php 

class Home extends Controller {
    public function index()
    {
        header('Location: ' . BASEURL . '/login');
        exit;
    }
}