<?php

class Answers extends DAO {

    function __construct($db) {
        parent::__construct($db, TBL_ANSWERS);
    }

    function add($userId, $blogPostId, $post, $datePosted) {
        return $this->db->execute("INSERT INTO ".$this->table." (user_id, blog_post_id, post, date_posted) VALUES ('".$userId."', '".$blogPostId."', '".$post."', '".$datePosted."')");
    }
    function update($id, $userId, $blogPostId, $post, $date_posted) {
        return $this->db->update($this->table, "userId = '".$userId."', blogPostId = '".$blogPostId."', post = '".$post."', date_posted = '".$date_posted."'", "id = '".$id."'");
    }

    function getAllForBlogPost($blogPostId) {
        return $this->db->execute("SELECT * FROM ".$this->table." WHERE blog_post_id = '".$blogPostId."'")->fetchAll();
    }
}