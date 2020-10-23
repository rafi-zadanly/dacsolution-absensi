<?php 
use Dompdf\Dompdf;

class Laporan extends Controller {
    // public function __construct()
    // {
    //     Authorize::check();
    //     Authorize::checkAdmin();
    // }

    public function index()
    {
        $data['page'] = 'Laporan';
        $data['nested_page'] = '';        
        $this->view('templates/header', $data);
        $this->view('admin/laporan/index', $data);
        $this->view('templates/footer');
    }

    public function tanpa_tanggal()
    {
        $file = $_GET["file"];
        $data = $_GET["data"];

        if ($file == "PDF") {
            # code...
        }elseif ($file == "XLS") {
            # code...
        }
    }
}