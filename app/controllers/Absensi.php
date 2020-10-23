<?php 

class Absensi extends Controller {
    public function __construct()
    {
        Authorize::checkAdmin();
    }

    public function index()
    {
        $data['page'] = 'Absensi';
        $data['nested_page'] = '';
        $this->view('templates/header', $data);
        $this->view('admin/absensi/index', $data);
        $this->view('templates/footer');
    }

    public function edit()
    {
        $data['page'] = 'Absensi';
        $data['nested_page'] = '';
        $this->view('templates/header', $data);
        $this->view('admin/absensi/edit', $data);
        $this->view('templates/footer');
    }
}