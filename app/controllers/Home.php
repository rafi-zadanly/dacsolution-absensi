<?php 

class Home extends Controller {
    public function index()
    {
        $data['page'] = 'Home';
        $this->view('templates/header', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }
}