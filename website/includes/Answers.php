<?php

class Answers extends DAO {

    function __construct($db) {
        parent::__construct($db, TBL_ANSWERS);
    }

    function add($userId, $blogPostId) {
        return $this->db->execute("INSERT INTO ".$this->table." (userId, blogPostId) VALUES ('".$userId."', '".$blogPostId."')");
    }
    function update($id, $userId, $blogPostId) {
        return $this->db->update($this->table, "userId = '".$userId."', blogPostId = '".$blogPostId."'", "id = '".$id."'");
    }
}