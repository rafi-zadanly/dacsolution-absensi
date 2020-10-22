<?php 

class Inventory extends Controller {
    // public function __construct()
    // {
    //     Authorize::check();
    //     Authorize::checkAdmin();
    // }

    public function index()
    {
        $data['page'] = 'Inventory';
        $data['nested_page'] = '';        
        $this->view('templates/header', $data);
        $this->view('admin/inventory/index', $data);
        $this->view('templates/footer');
    }
}