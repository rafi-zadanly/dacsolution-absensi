<?php 

class Karyawan extends Controller {
    public function __construct()
    {
        Authorize::check();
        Authorize::checkAdmin();
    }

    public function index()
    {
        $data['page'] = 'Karyawan';
        $data['nested_page'] = '';
        $data['karyawan'] = $this->model('Karyawan_Model')->getAll();
        $this->view('templates/header', $data);
        $this->view('admin/karyawan/index', $data);
        $this->view('templates/footer');
    }

    public function store()
    {
        $name = $_POST["save_name"];
        $email = $_POST["save_email"];
        $pin = $_POST["save_pin"];
        $role = $_POST["save_role"];
        $req_data = [
            "name" => $name,
            "email" => $email,
            "pin" => $pin,
            "role" => $role,
        ];

        if (($name && $email && $pin && $role) != "") {
            $status_post = $this->model('Karyawan_Model')->store($req_data);
            if ($status_post > 0) {
                Flasher::setFlash("Berhasil menambahkan data karyawan.", "success");
            }else{
                Flasher::setFlash("Gagal menambahkan data karyawan.", "danger");
            }
        }else{
            OlderValues::set("save_name", $name);
            OlderValues::set("save_email", $email);
            OlderValues::set("save_pin", $pin);
            OlderValues::set("save_role", $role);
            OlderValues::set("modal", "Add");
            Flasher::setFlash("Isikan form dengan benar.", "danger");
        }
        
        header('Location: ' . BASEURL . '/karyawan');
    }

    public function destroy(){
        $id = $_POST["id_delete"];
        $status_delete = $this->model('Karyawan_Model')->destroy($id);
        if ($status_delete > 0) {
            Flasher::setFlash("Berhasil menghapus data karyawan.", "success");
        }else{
            Flasher::setFlash("Gagal menghapus data karyawan.", "danger");
        }

        header('Location: ' . BASEURL . '/karyawan');
    }
}

    
?>