<?php
    $page = new Page("Home", $SessionPerson);
    $page->requireLogin();
    $page->showHeader();
    echo "<a href=".$page->link("categories").">Categories</a>";

    $page->showFooter();
?>