<?php 

class Home extends Controller {
    public function index()
    {
        $this->view("home/index");
    }

    public function time_now()
    {
        echo date("d-m-Y H:i:s");
    }

    public function absent()
    {
        if (RequestMethod::is("POST")) {
            $data = [
                "pin" => $_POST["pin"],
                "image" => $_POST["image"],
                "tugas_luar" => $_POST["tugas_luar"],
                "tujuan" => $_POST["tujuan"],
            ];
            $absent = $this->model("Absensi_Model")->absent($data);
            echo json_encode($absent);
        }else{
            exit;
        }
    }

    public function attend_time($pin)
    {
        if (isset($pin)) {
            $attend_time = $this->model("Absensi_Model")->attendTimeNowBy($pin);
            $ret = $attend_time;
            if ($attend_time != "") {
                $attend_time = strtotime($attend_time);
                $now_time = strtotime(date("H:i:s"));
                $difference = $now_time - $attend_time;
                $hours = floor($difference / (60 * 60));
                $minutes = $difference - $hours * (60 * 60);
                $ret = $hours . " Jam " . floor($minutes/60) . " Menit";
            }
            echo $ret;
        }
    }
}