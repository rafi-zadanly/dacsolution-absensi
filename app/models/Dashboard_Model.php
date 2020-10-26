<?php 

class Dashboard_Model {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function dashboard()
    {
        $this->db->query("");
        
    }
}

?>