<?php
	$page = new Page("Edit Categories Page", $SessionPerson);
	$page->requireLogin();
	$page->showHeader();
?>
<form class="form-horizontal" role="form">
	<div class="form-group">
	</div>

	<div class="form-group">
		<h2>Categories edit page</h2>
		<button type="add_category" class="btn btn-default">Add Category</button> 
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
	
	//need to add href to each button into DB categories
	$page->showFooter();
?>