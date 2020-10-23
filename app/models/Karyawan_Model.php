<?php 

class Karyawan_Model {
    private $table = 'karyawan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function auth($data)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE email=:email AND pin=:pin');
        $this->db->bind('email', $data["email"]);
        $this->db->bind('pin', md5($data["pin"]));

        return $this->db->single();
    }

    public function getAll()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function validateInput($data)
    {
        $pin_used = false;
        $email_used = false;

        $query = 'SELECT * FROM ' . $this->table . ' WHERE pin=:pin';

        $this->db->query($query);
        $this->db->bind('pin', md5($data['pin']));
        $this->db->resultSet();
        $pin_used = $this->db->rowCount() > 0 ? true : false;

        $ret["pin_used"] = $pin_used;

        $query = 'SELECT * FROM ' . $this->table . ' WHERE email=:email';

        $this->db->query($query);
        $this->db->bind('email', $data['email']);
        $this->db->resultSet();
        $email_used = $this->db->rowCount() > 0 ? true : false;

        $ret["email_used"] = $email_used;

        return $ret;
    }

    public function store($data)
    {
        $ret = $this->validateInput($data);

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
        $ret = $this->validateInput($data);
        if ($ret["pin_used"] == false && $ret["email_used"] == false) {
            $pin = $data['pin'] != "" ? ", pin = :pin" : "";
            $query = "UPDATE " . $this->table . " SET full_name = :name, email = :email, role = :role" . $pin . " WHERE id = :id";
            
            $this->db->query($query);
            $this->db->bind('email', $data['email']);
            $this->db->bind('name', $data['name']);
            $this->db->bind('role', $data['role']);
            $this->db->bind('id', $data['id']);

            if ($pin != "") {
                $this->db->bind('pin', md5($data['pin']));
            }

            $this->db->execute();
            $ret["row"] = $this->db->rowCount();
        }

        return $ret;
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