<?php

$page = new Page("Search Results", $SessionPerson);

$page->getModule("blogPost");
$page->getModule("categories");
$page->showHeader();

if(isset($_POST["search_submit"])) {
    $value = $_POST["search"];

    echo '<h2>Showing Results for '.$value.'</h2>';
    foreach($BlogPosts->like($value, "post") as $r) {
        $u = $Users->get($r["user_id"]);
        $cname = $Categories->get($r["category"])["name"];
        blogPostWithCategory($r["id"], $r["title"], $u["first_name"], $u["last_name"], $r["date_posted"], $r["category"], $cname);
    }

    foreach($BlogPosts->like($value, "title") as $r) {
        $u = $Users->get($r["user_id"]);
        $cname = $Categories->get($r["category"])["name"];
        blogPostWithCategory($r["id"], $r["title"], $u["first_name"], $u["last_name"], $r["date_posted"], $r["category"], $cname);
    }





} else {
    echo "Nothing to show.";
}
$page->showFooter();

?>