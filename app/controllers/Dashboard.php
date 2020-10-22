<?php 

class Dashboard extends Controller {
    public function __construct()
    {
        Authorize::check();
    }

    public function index()
    {
        $data['page'] = 'Dashboard';
        $data['nested_page'] = '';
        
        $this->view('templates/header', $data);
        if (Authorize::isAdmin()) {
            $this->view('admin/dashboard/index', $data);
        }
        if (Authorize::isUser()) {
            $this->view('user/dashboard/index', $data);
        }
        $this->view('templates/footer');
    }
}