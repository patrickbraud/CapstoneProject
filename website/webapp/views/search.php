<?php

$page = new Page("Search Results", $SessionPerson);

$page->getModule("blogPost");
$page->showHeader();

$page->getModule("categories");

if(isset($_POST["search_submit"])) {
    $value = $_POST["search"];
    unset($_POST);
    $emptyString = empty($value);
    $noResults = "No Results Found.";
    $title = "Showing Results for ".$value.".";
    if($emptyString) $title = $noResults;

    $page->setTitle($title);

    ?>
    <div class="container col-md-12">
        <div class="panel-body text-center">
            <?php echo "<h2>$title</h2>"; ?>
        </div>
    </div>
    <?php ListCategories($Categories, $SessionPerson->id()); ?>
    <div class="container col-md-6">
    <?php
    if (!$emptyString) {
        $r1 = null;
        $r2 = null;
        foreach ($BlogPosts->like($value, "post") as $r) {
            $u = $Users->get($r["user_id"]);
            $cname = $Categories->get($r["category"])["name"];
            $ans = $r["correctAnswerId"] > 0;
            $opened = $r["marked"] == 0;
            if ($opened || $page->isAdmin($Role))
                blogPostWithCategory($r["id"], $r["title"], $u["id"], $u["first_name"], $u["last_name"], $r["date_posted"], $r["category"], $cname, $ans, $opened);
        }

        foreach ($BlogPosts->like($value, "title") as $r) {
            $u = $Users->get($r["user_id"]);
            $cname = $Categories->get($r["category"])["name"];
            $ans = $r["correctAnswerId"] > 0;
            $opened = $r["marked"] == 0;
            if ($opened || $page->isAdmin($Role))
                blogPostWithCategory($r["id"], $r["title"], $u["id"], $u["first_name"], $u["last_name"], $r["date_posted"], $r["category"], $cname, $ans, $opened);
        }
    } else {
        //echo $noResults;
    }

} else {
    echo $noResults;
}
?>
    </div>

<?php

$page->showFooter();

?>