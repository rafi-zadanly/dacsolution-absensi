<?php 
class Migration extends Controller {
    public function absensi()
    {
        $exec = $this->model('Absensi_Model')->migrate();
        echo $exec;
    }
}

?>