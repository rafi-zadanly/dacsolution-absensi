<?php 

class Karyawan extends Controller {
    public function index()
    {
        $data['page'] = 'Karyawan';
        $data['nested_page'] = '';
        $data['karyawan'] = $this->model('Karyawan_Model')->getAll();
        $this->view('templates/header', $data);
        $this->view('karyawan/index', $data);
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
        }
        
        header('Location: ' . BASEURL . '/karyawan');
    }
}

?>