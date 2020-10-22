<?php 

class Dashboard extends Controller {
    public function index()
    {
        $data['page'] = 'Dashboard';
        $data['nested_page'] = '';
        $this->view('templates/header', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }
}