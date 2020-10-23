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

    public function add()
    {
        $data['page'] = 'Karyawan';
        $data['nested_page'] = '';
        $this->view('templates/header', $data);
        $this->view('admin/karyawan/add');
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
            Redirect::to("/karyawan");
        }
    }

    public function store()
    {
        if (RequestMethod::is('POST')) {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $pin = $_POST["pin"];
            $role = $_POST["role"];
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
                        Redirect::to("/karyawan");
                    }else{
                        Flasher::setFlash("Gagal menambahkan data karyawan.", "danger");
                    }
                }else{
                    $this->older_values($req_data);
                    if ($status_post["email_used"]) {
                        Flasher::setFlash("Email tersebut sudah digunakan.", "danger");
                    }else if($status_post["pin_used"]){
                        Flasher::setFlash("Pin tersebut sudah digunakan.", "danger");
                    }
                }
            }else{
                $this->older_values($req_data);
                Flasher::setFlash("Isikan form dengan benar.", "danger");
            }
        }

        Redirect::to("/karyawan/add");
    }

    private function older_values($data)
    {
        OlderValues::set("name", $data["name"]);
        OlderValues::set("email", $data["email"]);
        OlderValues::set("pin", $data["pin"]);
        OlderValues::set("role", $data["role"]);
    }

    public function update($id = NULL)
    {
        if ($id != NULL && RequestMethod::is('POST')) {
            $name = $_POST["name"];
            $old_email = $_POST["old_email"];
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

            $update["email"] = $old_email != $email ? true : false;
            $update["pin"] = $pin != "" ? true : false;

            if (($name && $email && $role) != "") {
                $status_post = $this->model('Karyawan_Model')->update($req_data, $update);
                
                if ($status_post["pin_used"] == false && $status_post["email_used"] == false) {
                    if ($status_post["row"] > 0) {
                        Flasher::setFlash("Berhasil mengubah data karyawan.", "success");
                        Redirect::to("/karyawan");
                    }else{
                        Flasher::setFlash("Gagal mengubah data karyawan.", "danger");
                    }
                }else{
                    $this->older_values($req_data);
                    if ($status_post["email_used"]) {
                        Flasher::setFlash("Email tersebut sudah digunakan.", "danger");
                    }else if($status_post["pin_used"]){
                        Flasher::setFlash("Pin tersebut sudah digunakan.", "danger");
                    }
                }
                
            }else{
                $this->older_values($req_data);
                Flasher::setFlash("Isikan form dengan benar.", "danger");
            }
        }
        
        Redirect::to("/karyawan/edit/" . $id);
    }

    public function destroy(){
        if (RequestMethod::is('POST')) {
            $id = $_POST["id_delete"];
            $status_delete = $this->model('Karyawan_Model')->destroy($id);
            if ($status_delete > 0) {
                Flasher::setFlash("Berhasil menghapus data karyawan.", "success");
            }else{
                Flasher::setFlash("Gagal menghapus data karyawan.", "danger");
            }
        }

        Redirect::to("/karyawan");
    }
}

    
?>