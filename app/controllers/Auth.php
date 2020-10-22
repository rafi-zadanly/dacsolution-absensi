<?php 

class Auth extends Controller {
    public function login()
    {
        $req_data = [
            "email" => $_POST["email"],
            "pin" => $_POST["pin"]
        ];
        $auth_data = $this->model('Karyawan_Model')->auth($req_data);
        session_start();
        if ($auth_data != NULL) {
            
            $_SESSION["auth"]["full_name"] = $auth_data["full_name"];
            $_SESSION["auth"]["role"] = $auth_data["role"];
            Flasher::setFlash('Berhasil login sebagai ' . $auth_data["full_name"], 'success');

            header('Location: ' . BASEURL . '/dashboard');
        }else{
            OlderValues::set("email", $req_data["email"]);
            OlderValues::set("pin", $req_data["pin"]);
            Flasher::setFlash('Username atau Password yang anda masukan salah.', 'danger');
            header('Location: ' . BASEURL . '/login');
        }
    }

    public function logout()
    {
        header('Location: ' . BASEURL . '/login');
        session_destroy();
    }
}