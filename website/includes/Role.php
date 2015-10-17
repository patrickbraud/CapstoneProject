<?php

class Role {
    private $db;
    function __construct($db){
        $this->db = $db;
    }
    public function remove($id) {
        return $this->db->delete(TBL_ROLES, $id);
    }
    public function get($id) {
        $this->db->execute("SELECT * FROM ".TBL_ROLES." WHERE id = '.$id.'");
        return $this->db->fetchAll();
    }
}