<?php 

class Absensi extends Controller {
    public function __construct()
    {
        Authorize::check();
    }

    public function index($from = "", $to = "")
    {
        $from = isset($_POST['from']) != NULL ? $_POST['from'] : "";
        $to = isset($_POST['to']) != NULL ? $_POST['to'] : "";
        
        if ($to == "") {
            $from = $from != "" ? $from : date("Y-m-d");
        }

        $data['page'] = 'Absensi';
        $data['nested_page'] = '';
        $data['absensi'] = $this->model("Absensi_Model")->filter($from, $to);
        $data['from'] = $from;
        $data['to'] = $to;
        
        if ($data["absensi"]["data_row"] == 0) {
            Flasher::setFlash("Data tidak ditemukan dari tanggal yang dicari.", "danger");
        }

        $this->view('templates/header', $data);
        $this->view('admin/absensi/index', $data);
        $this->view('templates/footer');
    }
// 
    public function create_all()
    {
        Authorize::checkAdmin();

        $data = $this->model("Absensi_Model")->create_all();
        if ($data['row'] > 0) {
            Flasher::setFlash("Berhasil membuatkan absensi untuk hari ini.", "success");
        }else{
            Flasher::setFlash("Absensi untuk hari ini sudah ada.", "danger");
        }
        Redirect::to('/absensi');
    }

    public function edit($id)
    {
        if ($id != NULL) {
            $data['page'] = 'Absensi';
            $data['nested_page'] = '';
            $data['absensi'] = $this->model('Absensi_Model')->getById($id);
            if ($data['absensi'] != NULL) {
                $this->view('templates/header', $data);
                $this->view('admin/absensi/edit', $data);
                $this->view('templates/footer');
            }else{
                Flasher::setFlash("Tidak ada data absensi dengan nomor ID ($id)", "danger");
                Redirect::to("/absensi");
            }
        }else{
            Redirect::to("/karyawan");
        }
        
    }

    public function detail()
    {
        $data['page'] = 'Absensi';
        $data['nested_page'] = '';
        $this->view('templates/header', $data);
        $this->view('admin/absensi/detail', $data);
        $this->view('templates/footer');
    }
}