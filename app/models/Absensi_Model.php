<?php 

class Absensi_Model {
    private $table = 'absensi';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function absent($data)
    {
        // Pengecekan apakah data ada di database
        $this->db->query('SELECT absensi.id, absensi.attend_time, absensi.leave_time, absensi.outside_job FROM absensi, karyawan WHERE absensi.date=:date AND karyawan.pin=:pin AND absensi.karyawan_id = karyawan.id');
        $this->db->bind('date', date("Y-m-d"));
        $this->db->bind('pin', md5($data["pin"]));
        $valData = $this->db->single();
        $rowData = $this->db->rowCount();
        $ret = [];

        if ($rowData > 0) {
            $dataURL = $data["image"];
            $parts = explode(',', $dataURL);
            $image = base64_decode($parts[1]);
            $filename = date("dmY_His") . "_" . $valData["id"] . ".png";
            $path = "img/attendance/" . $filename;
            file_put_contents($path, $image);
            // Pengecekan apakah data kehadiran sudah ada
            // Jika sudah, otomatis mengisi data pulang
            if ($valData["attend_time"] == NULL) {
                $this->db->query('UPDATE absensi SET attend_time=:time, attend_image=:image, outside_job=:outside_job, information=:information WHERE id=:id');
                $tugas_luar = $data["tugas_luar"] == "true" ? true : false;
                $this->db->bind('outside_job', $tugas_luar);
                $this->db->bind('information', $data["tujuan"]);
            }else if ($valData["attend_time"] != NULL && $valData["leave_time"] == NULL){
                $this->db->query('UPDATE absensi SET leave_time=:time, leave_image=:image WHERE id=:id');
            }else{
                $ret["message"] = "Anda sudah melakukan absensi kehadiran dan pulang.";
                $ret["status"] = "failed";
                return $ret;
            }
            $this->db->bind('time', date("H:i:s"));
            $this->db->bind('image', $filename);
            $this->db->bind('id', $valData["id"]);
            $this->db->execute();
            $rowData = $this->db->rowCount();
            if ($rowData > 0) {
                $ret["message"] = "Berhasil melakukan absensi.";
                $ret["status"] = "success";
            }else{
                $ret["message"] = "Gagal melakukan absensi.";
                $ret["status"] = "failed";
            }
        }else{
            $ret["message"] = "Belum ada data absensi untuk hari ini atau pin yang anda masukan salah.";
            $ret["status"] = "failed";
        }

        return $ret;
    }
    
    public function attendTimeNowBy($pin)
    {
        $this->db->query('SELECT absensi.attend_time, absensi.leave_time FROM absensi, karyawan WHERE absensi.date=:date AND karyawan.pin=:pin AND absensi.karyawan_id = karyawan.id');
        $this->db->bind('date', date("Y-m-d"));
        $this->db->bind('pin', md5($pin));
        $data = $this->db->single();
        $row = $this->db->rowCount();
        $ret = "";
        if ($row > 0 && $data["attend_time"] != NULL && $data["leave_time"] == NULL) {
            $ret = $data["attend_time"];
        }
        
        return $ret;
    }

    public function filter($from, $to)
    {
        $query = 'SELECT absensi.*, karyawan.email, karyawan.full_name FROM absensi, karyawan WHERE absensi.karyawan_id = karyawan.id AND ';
        if ($from != "" && $to == "") {
            $query .= 'absensi.date >= :from';
            $this->db->query($query);
            $this->db->bind('from', $from);
        } else if ($to != "" && $from == "") {
            $query .= 'absensi.date <= :to';
            $this->db->query($query);
            $this->db->bind('to', $to);
        } else {
            $query .= 'absensi.date BETWEEN :from AND :to';
            $this->db->query($query);
            $this->db->bind('from', $from);
            $this->db->bind('to', $to);
        }
        $ret["data"] = $this->db->resultSet();
        $ret["data_row"] = $this->db->rowCount();
        return $ret;
    }

    public function create_all()
    {
        $date = date("Y-m-d");
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE date=:date');
        $this->db->bind('date', $date);
        $this->db->execute();
        $ret["row"] = $this->db->rowCount();

        if ($ret["row"] == 0) {
            $this->db->query('SELECT * FROM karyawan');
            $result = $this->db->resultSet();
            $query = "";
            foreach ($result as $r) {
                $query .= 'INSERT INTO absensi (karyawan_id, date) VALUES ('. $r['id'] .', "' . $date . '");';
            }
            $this->db->query($query);
            $this->db->execute();
            $ret['row'] = $this->db->rowCount();
        }

        return $ret;
    }

    public function getAll()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $this->db->query('SELECT absensi.*, karyawan.full_name FROM absensi, karyawan WHERE absensi.karyawan_id = karyawan.id AND absensi.id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function store($data)
    {
        $pin_used = false;
        $email_used = false;

        $query = 'SELECT * FROM ' . $this->table . ' WHERE pin=:pin';

        $this->db->query($query);
        $this->db->bind('pin', md5($data['pin']));
        $this->db->resultSet();
        $pin_used = $this->db->rowCount() > 0 ? true : false;

        $query = 'SELECT * FROM ' . $this->table . ' WHERE email=:email';

        $this->db->query($query);
        $this->db->bind('email', $data['email']);
        $this->db->resultSet();
        $email_used = $this->db->rowCount() > 0 ? true : false;

        $ret["pin_used"] = $pin_used;
        $ret["email_used"] = $email_used;

        if ($ret["pin_used"] == false && $ret["email_used"] == false) {
            $query = "INSERT INTO " . $this->table . " VALUES (NULL, :email, :name, :pin, :role)";
        
            $this->db->query($query);
            $this->db->bind('email', $data['email']);
            $this->db->bind('name', $data['name']);
            $this->db->bind('pin', md5($data['pin']));
            $this->db->bind('role', $data['role']);
            $this->db->execute();
            $ret["row"] = $this->db->rowCount();
        }

        return $ret;
    }

    public function update($data)
    {
        $this->db->query('UPDATE ' . $this->table . ' SET attend_time=:attend_time, leave_time=:leave_time, outside_job=:outside_job, information=:information WHERE id=:id');
        $this->db->bind('id', $data['id']);
        $this->db->bind('attend_time', $data['attend_time']);
        $this->db->bind('leave_time', $data['leave_time']);
        $this->db->bind('outside_job', $data['outside_job']);
        $this->db->bind('information', $data['information']);
        $this->db->execute();
        $row = $this->db->rowCount();
        
        return $row;
    }

    public function destroy($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function searchData()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }

}