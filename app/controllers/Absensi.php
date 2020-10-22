<?php 

class Absensi extends Controller {
    public function index()
    {
        $data['page'] = 'Absensi';
        $data['nested_page'] = '';
        $this->view('templates/header', $data);
        $this->view('absensi/index', $data);
        $this->view('templates/footer');
    }
}