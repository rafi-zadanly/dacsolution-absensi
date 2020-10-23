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

    public function add()
    {
        $data['page'] = 'Inventory';
        $data['nested_page'] = '';        
        $this->view('templates/header', $data);
        $this->view('admin/inventory/add', $data);
        $this->view('templates/footer');
    }

    public function edit()
    {
        $data['page'] = 'Inventory';
        $data['nested_page'] = '';        
        $this->view('templates/header', $data);
        $this->view('admin/inventory/edit', $data);
        $this->view('templates/footer');
    }
}