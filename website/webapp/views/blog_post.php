<?php
    $page = new Page("TTU Computer Science Blog", $SessionPerson);
    $page->requireLogin();
    $page->showHeader();


    echo newBlogPost("Blog Post Title", "James Little is a bitch", "September 9th 1999", "http://placehold.it/900x300", "something something");
    echo newBlogPost("Blog Post Title", "James Little", "September 9th 1999", "http://placehold.it/900x300", "something something");
    echo newBlogPost("Blog Post Title", "James Little", "September 9th 1999", "http://placehold.it/900x300", "something something");
    echo pager();

    $page->showFooter();
?>