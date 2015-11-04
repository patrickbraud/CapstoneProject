<?php
$page = new Page("", $SessionPerson);
$page->requireAdmin($Role);

$func = $page->getQuery("func");
if(isset($func)) {
    $postId = $page->getQuery("postId");
    $ref = $page->getQuery("ref");

    if ($func == "closePost") {
        $BlogPosts->close($postId);

    } else if ($func == "movePost") {
        $categoryId = $page->getQuery("categoryId");
        $BlogPosts->movePost($postId, $categoryId);
    } else if ($func == "openPost") {
        $BlogPosts->open($postId);
    }

    $page->removeAllQuerys();
    $page->addQuery("page", $ref);
    $page->addQuery("id", $postId);
    $page->redirect();
}