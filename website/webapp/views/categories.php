<?php

    $page = new Page("Categories", $SessionPerson);
    $page->requireLogin();

    $page->showHeader();
    echo "<h1>".$page->getTitle()."</h1>";
    $page->getModule("categories");
    listCategories($Categories);
    $page->showFooter();

?>

