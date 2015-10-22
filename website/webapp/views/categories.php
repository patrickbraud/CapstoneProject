<?php

    $page = new Page("Categories", $SessionPerson);
    $page->requireLogin();

    $page->showHeader();
    echo "<h1>".$page->getTitle()."</h1>";
    echo "<hr />";
    foreach($Categories->getAll() as $c) {
        echo "<a href=".$page->link("questions_list") . "&id=".$c['id']."&name=".$c['name'].">".$c['name']."</a>";
        echo "<br />";
    }
echo "<hr />";
    $page->showFooter();

?>

