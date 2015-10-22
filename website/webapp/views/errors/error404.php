<?php
$page = new Page("404 - Page Not Found", $SessionPerson);
$page->showHeader();
?>
    <p>The page you are looking for does not exist, sorry homie.</p>

    <p><a href="?">Home</a></p>

<?php
$page->showFooter();
?>