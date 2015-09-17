<?php
    $page = new Page("This is my title");
    $page->showHeader();
?>

<p>Hello World</p>
<a href="<?php echo $page->link("home", "admin"); ?>">Admin</a>

<?php
    $page->showFooter();
?>