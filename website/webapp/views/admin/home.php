<?php
    $page = new Page("Admin Page", $SessionPerson);
    $page->requireAdmin($Role);
    $page->showHeader();
?>
<form class="form-horizontal" role="form">

	<div class="form-group">
		<div class="col-md-4">

			<button type="button" class="btn btn-default" ><a href="<?php echo $page->link("users", "admin"); ?>">Edit Users</a></button>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-4">
			<button type="button" class="btn btn-default"><a href="<?php echo $page->link("categories", "admin"); ?>">Categories</a></button>
		</div>
	</div>

</form>
<?php
    $page->showFooter();
?>


