<?php 

class Login extends Controller {
    public function index()
    {
        if (Authorize::isLogin()) {
            Flasher::setFlash("Sesi login anda masih ada.", "success");
            Redirect::to('/dashboard');
        }
        $this->view('login/index');
    }
}

?>