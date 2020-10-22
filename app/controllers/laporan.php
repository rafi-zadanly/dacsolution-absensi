<?php 

class Laporan extends Controller {
    // public function __construct()
    // {
    //     Authorize::check();
    //     Authorize::checkAdmin();
    // }

    public function index()
    {
        $data['page'] = 'Laporan';
        $data['nested_page'] = '';        
        $this->view('templates/header', $data);
        $this->view('admin/laporan/index', $data);
        $this->view('templates/footer');
    }
}