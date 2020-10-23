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

            Redirect::to("/dashboard");
        }else{
            OlderValues::set("email", $req_data["email"]);
            OlderValues::set("pin", $req_data["pin"]);
            Flasher::setFlash('Username atau Password yang anda masukan salah.', 'danger');
            Redirect::to("/login");
        }
    }

    public function logout()
    {
        Flasher::setFlash('Berhasil Logout.', 'success');
        header('Location: ' . BASEURL . '/login');
        session_destroy();
        unset($_SESSION["auth"]);
    }
}