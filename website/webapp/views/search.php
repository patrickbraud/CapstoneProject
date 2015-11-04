<?php

$page = new Page("Search Results", $SessionPerson);

$page->showHeader();

if(isset($_POST["search_submit"])) {
    $value = $_POST["search"];

    $DB->execute("")
} else {
    echo "Nothing to show.";
}

$page->showFooter();

?>