<?php
	$page = new Page("Edit Categories Page");
	$page->showHeader();
?>
<form class="form-horizontal" role="form">
	<div class="form-group">
	</div>

	<div class="form-group">
		<p>Categories edit page</p>
	</div>
</form>

<div class="list-group">
  <button type="button" class="list-group-item">Artificial Intelligence</button>
  <button type="button" class="list-group-item">Big Data</button>
  <button type="button" class="list-group-item">Computer Architecture</button>
  <button type="button" class="list-group-item">Computer Engineering</button>
  <button type="button" class="list-group-item">Computer Graphics</button>
</div>

<?php
	$page->showFooter();
?>