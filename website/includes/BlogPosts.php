<?php

class BlogPosts extends DAO{

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

}