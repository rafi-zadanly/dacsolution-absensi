<?php 

class Dashboard extends Controller {
    public function __construct()
    {
        if ($_SESSION["auth"] == NULL) {
            header('Location: ' . BASEURL . '/login');
        }
    }

    public function index()
    {
        $data['page'] = 'Dashboard';
        $data['nested_page'] = '';
        $this->view('templates/header', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }
}