<?php

class Categories extends DAO {

    function __construct($db) {
        parent::__construct($db, TBL_CATEGORIES);
    }

    function add($name) {
        return $this->db->execute("INSERT INTO ".$this->table." (name) VALUES ('".$name."')");
    }
    function update($id, $name) {
        return $this->db->update($this->table, "name = '".$name."'", "id = '".$id."'");
    }
}

?>