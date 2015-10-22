<?php
    $page = new Page("Admin Page", $SessionPerson);
    $page->requireAdmin($Role);
    $page->showHeader();
?>
<p>Hello, go back to <a href="<?php echo $page->link("home"); ?>">home</a>?</p>
<?php
    $page->showFooter();
?>


