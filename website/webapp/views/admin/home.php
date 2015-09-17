<?php
    $page = new Page("Admin Page");
    $page->showHeader();
?>
<p>Hello, go back <a href="<?php echo $page->link("home"); ?>">home</a>?</p>
<?php
    $page->showFooter();
?>


