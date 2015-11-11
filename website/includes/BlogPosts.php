<?php

class BlogPosts extends DAO {

    function __construct($db) {
        parent::__construct($db, TBL_BLOG_POSTS);
    }

    function add($title, $post, $marked, $categoryId, $userId, $datePosted, $correctAnswerId) {
        $this->db->execute(
            "INSERT INTO ".$this->table." (title, post, marked, category, user_id, date_posted, correctAnswerId)
                VALUES ('".$title."', '".$post."', '".$marked."', '".$categoryId."', '".$userId."', '".$datePosted."', '".$correctAnswerId."')"
        );
    }

    function update($id, $title, $post, $marked, $category, $userId, $datePosted, $correctAnswerId) {
        return $this->db->update(
            $this->table,
            "title = '".$title."', post = '".$post."' $marked = '".$category."', userId = '".$userId."', date_posted = '".$datePosted."', '".$correctAnswerId."'",
            "id = '".$id."'"
        );
    }

    function getAllFromCategoryId($categoryId, $limit = 0, $offset = 0) {
        $q = "SELECT * FROM ".$this->table." WHERE category = '".$categoryId."' ORDER BY id DESC";
        if($limit > 0)
            $q = $q." LIMIT $limit";
        if($offset > 0)
            $q = $q." OFFSET $offset";

        return $this->db->execute($q)->fetchAll();
    }

    function getAllForUser($userId, $limit = 0, $offset = 0) {
        $q = "SELECT * FROM ".$this->table." WHERE user_id = '".$userId."' ORDER BY id DESC";
        if($limit > 0)
            $q = $q." LIMIT $limit";
        if($offset > 0)
            $q = $q." OFFSET $offset";

        return $this->db->execute($q)->fetchAll();
    }

    function hasAnswer($id) {
        return $this->get($id)["correctAnswerId"] > 0;
    }

    function isPoster($id, $userId) {
        return $this->get($id)["user_id"] == $userId;
    }

    function markAnswer($id, $markId) {
        $this->db->update($this->table, "correctAnswerId = '".$markId."'", "id = '".$id."'");
    }

    function movePost($id, $newCategoryId) {
        $this->db->update($this->table, "category = '".$newCategoryId."'", "id = '".$id."'");
    }

    function close($id) {
       $this->db->update($this->table, "marked = '1'", "id = '".$id."'");
    }

    function open($id) {
        $this->db->update($this->table, "marked = '0'", "id = '".$id."'");
    }

}