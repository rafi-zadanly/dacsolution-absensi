<?php 

class Inventory extends Controller {
    public function __construct()
    {
        Authorize::check();
        Authorize::checkAdmin();
    }

    public function index()
    {
        $data['page'] = 'Inventory';
        $data['nested_page'] = '';       
        $data['inventory'] = $this->model('Inventory_Model')->getAll(); 
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

    public function detail($id)
    {
        $data['page'] = 'Inventory';
        $data['nested_page'] = '';     
        $data['inventory'] = $this->model('Inventory_Model')->getById($id);
        $this->view('templates/header', $data);
        $this->view('admin/inventory/detail', $data);
        $this->view('templates/footer');
    }

    public function destroy(){
        if (RequestMethod::is('POST')) {
            $id = $_POST["id_delete"];
            $status_delete = $this->model('Inventory_Model')->destroy($id);
            if ($status_delete > 0) {
                Flasher::setFlash("Berhasil menghapus data inventory.", "success");
            }else{
                Flasher::setFlash("Gagal menghapus data inventory.", "danger");
            }
        }

        Redirect::to("/inventory");
    }
}