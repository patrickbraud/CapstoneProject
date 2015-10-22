<?php
	$page = new Page("Close Blog", $SessionPerson);
	$page->showHeader();
?>

<form class="form-horizontal" role="form">
	<div class="form-group">
	</div>

	<div class="form-group">
		<p>The blog is closed right now for maintanence, sorry homie.</p>
	</div>
</form>

<?php

	$page->showFooter();
?>