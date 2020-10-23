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

    public function edit($id = NULL)
    {
        if ($id != NULL) {
            $data['page'] = 'Karyawan';
            $data['nested_page'] = '';
            $data['karyawan'] = $this->model('Karyawan_Model')->getById($id);
            $this->view('templates/header', $data);
            $this->view('admin/karyawan/edit', $data);
            $this->view('templates/footer');
        }else{
            header('Location: ' . BASEURL . '/karyawan');
        }
    }

    public function store()
    {
        if (RequestMethod::is('POST')) {
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
                
                if ($status_post["pin_used"] == false && $status_post["email_used"] == false) {
                    if ($status_post["row"] > 0) {
                        Flasher::setFlash("Berhasil menambahkan data karyawan.", "success");
                    }else{
                        Flasher::setFlash("Gagal menambahkan data karyawan.", "danger");
                    }
                }else{
                    $this->older_values_add($req_data);
                    if ($status_post["email_used"]) {
                        Flasher::setFlash("Email tersebut sudah digunakan.", "danger");
                    }else if($status_post["pin_used"]){
                        Flasher::setFlash("Pin tersebut sudah digunakan.", "danger");
                    }
                }
                
            }else{
                $this->older_values_add($req_data);
                Flasher::setFlash("Isikan form dengan benar.", "danger");
            }
        }
        
        header('Location: ' . BASEURL . '/karyawan');
    }

    private function older_values_add($data)
    {
        OlderValues::set("save_name", $data["name"]);
        OlderValues::set("save_email", $data["email"]);
        OlderValues::set("save_pin", $data["pin"]);
        OlderValues::set("save_role", $data["role"]);
        OlderValues::set("modal", "Add");
    }

    public function update($id = NULL)
    {
        if ($id != NULL && RequestMethod::is('POST')) {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $pin = $_POST["pin"];
            $role = $_POST["role"];
            $req_data = [
                "id" => $id,
                "name" => $name,
                "email" => $email,
                "pin" => $pin,
                "role" => $role,
            ];

            if (($name && $email && $role) != "") {
                $status_post = $this->model('Karyawan_Model')->update($req_data);
                
                if ($status_post["pin_used"] == false && $status_post["email_used"] == false) {
                    if ($status_post["row"] > 0) {
                        Flasher::setFlash("Berhasil menambahkan data karyawan.", "success");
                    }else{
                        Flasher::setFlash("Gagal menambahkan data karyawan.", "danger");
                    }
                }else{
                    $this->older_values_add($req_data);
                    if ($status_post["email_used"]) {
                        Flasher::setFlash("Email tersebut sudah digunakan.", "danger");
                    }else if($status_post["pin_used"]){
                        Flasher::setFlash("Pin tersebut sudah digunakan.", "danger");
                    }
                }
                
            }else{
                $this->older_values_add($req_data);
                Flasher::setFlash("Isikan form dengan benar.", "danger");
            }
        }
        
        
        header('Location: ' . BASEURL . '/karyawan');
    }

    public function destroy(){
        if (RequestMethod::is('post')) {
            $id = $_POST["id_delete"];
            $status_delete = $this->model('Karyawan_Model')->destroy($id);
            if ($status_delete > 0) {
                Flasher::setFlash("Berhasil menghapus data karyawan.", "success");
            }else{
                Flasher::setFlash("Gagal menghapus data karyawan.", "danger");
            }
        }

        header('Location: ' . BASEURL . '/karyawan');
    }
}

    
?>