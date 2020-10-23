<?php 

class LaporanCetakPdf extends Controller {
    // public function __construct()
    // {
    //     Authorize::check();
    //     Authorize::checkAdmin();
    // }

    public function index()
    {
        $data['page'] = 'LaporanCetakPdf';
        $data['nested_page'] = '';        
        $this->view('admin/laporan/cetak_pdf', $data);
    }
}