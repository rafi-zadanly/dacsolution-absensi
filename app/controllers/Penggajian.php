<?php 

class Penggajian extends Controller {
    public function index()
    {
        $data['page'] = 'Penggajian';
        $data['nested_page'] = '';
        $this->view('templates/header', $data);
        $this->view('admin/penggajian/index', $data);
        $this->view('templates/footer');
    }
}