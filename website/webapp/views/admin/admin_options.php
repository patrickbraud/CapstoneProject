<?php
	$page = new Page("Admin Options", $SessionPerson);
	$page->requireAdmin($Role);
	$page->showHeader();
?>



<?php
	$page->showFooter();
?>