<?php
    $SessionPerson->logout();
    $page = new Page();
    $page->changeQuery("page", HOME_PAGE);
    $page->redirect();