<?php

    $page = new Page("Categories");


    $page->showHeader();
    echo "<h1>".$page->getTitle()."</h1>";
    echo "<hr />";
    foreach($Categories->getAll() as $c) {
        echo "<a href=".$page->link("question_page") . "&id=".$c['id'].">".$c['name']."</a>";
        echo "<br />";
    }
echo "<hr />";
    $page->showFooter();

?>

