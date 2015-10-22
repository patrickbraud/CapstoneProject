<?php

    $page = new Page("", $SessionPerson);
    $page->requireLogin();

    if($page->getQuery("id") != NULL && $page->getQuery("name") != NULL) {
        $page->setTitle("Questions for ".$page->getQuery("name"));
        $page->showHeader();
        foreach($BlogPosts->getAllFromCategoryId($page->getQuery("id")) as $b) {
            echo "<a href=".$page->link("question_page") . "&id=".$b['id'].">".$b['title']."</a>";
        }
        $page->showFooter();
    } else {
        $page->changeQuery("page", "categories");
        $page->redirect();
    }

?>