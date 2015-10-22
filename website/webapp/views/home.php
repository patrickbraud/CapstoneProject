<?php
    $page = new Page("Home", $SessionPerson);
    $page->requireLogin();
    $page->showHeader();
    echo "<a href=".$page->link("categories").">Categories</a>";

    if($page->isAdmin($Role)) {
       echo "<a href=".$page->link("home", "admin").">Admin Panel</a>";
    }


    $page->showFooter();
?>