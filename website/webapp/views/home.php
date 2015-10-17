<?php
    $page = new Page("Home");
    $page->showHeader();
    echo "<a href=".$page->link("categories").">Categories</a>";

    $page->showFooter();
?>