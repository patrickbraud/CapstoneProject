<?php

class Categories extends DAO {

    function __construct($db) {
        parent::__construct($db, TBL_CATEGORIES);
    }

    function add($name, $view = USER_ROLE, $comment = USER_ROLE, $post = USER_ROLE) {
        return $this->db->execute("INSERT INTO ".$this->table." (`name`, `view`, comment, post) VALUES ('".$name."', $view, $comment, $post)");
    }
    function update($id, $name, $view = USER_ROLE, $comment = USER_ROLE, $post = USER_ROLE) {
        return $this->db->update($this->table, "name = '".$name."', view = '$view', comment = '$comment', post = '$post'", "id = '".$id."'");
    }

    function getAllForViewRole($roleId) {
        return $this->db->execute("SELECT * FROM ".$this->table." WHERE `view` <= $roleId ")->fetchAll();
    }

    function allowedToView($id, $roleId) {
        return $this->db->execute("SELECT * FROM ".$this->table." WHERE `view` <= $roleId AND id = $id")->numRows() > 0;
    }

    function allowedToPost($id, $roleId) {
        return $this->db->execute("SELECT * FROM ".$this->table." WHERE `post` <= $roleId AND id = $id")->numRows() > 0;
    }

    function allowedToComment($id, $roleId) {
        return $this->db->execute("SELECT * FROM ".$this->table." WHERE `comment` <= $roleId AND id = $id")->numRows() > 0;
    }

    function allowedToOpenClose($id, $roleId) {
        return $this->db->execute("SELECT * FROM ".$this->table." WHERE open_close <= $roleId AND id = $id")->numRows() > 0;
    }

    function allowedToDelete($id, $roleId) {
        return $this->db->execute("SELECT * FROM ".$this->table." WHERE `delete` <= $roleId AND id = $id")->numRows() > 0;
    }
}

?>