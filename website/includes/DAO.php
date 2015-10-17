<?php

class DAO {
     protected $db;
     protected $table;

    function __construct($db, $table) {
        $this->db = $db;
        $this->table = $table;
    }
    function get($id) {
        return $this->db->execute("SELECT * FROM ".$this->table." WHERE id = '".$id."'")->fetchRow();
    }
    function remove($id) {
        return $this->db->delete($this->table, "id = '".$id."'");
    }
    function getAll() {
        echo $this->table;
        return $this->db->execute("SELECT * FROM ".$this->table)->fetchAll();
    }
}