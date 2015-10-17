<?php
	$page = new Page("Admin Options");
	$page->showHeader();
?>

<form class="form-horizontal" role="form">

	<div class="form-group">
    </div>

	<div class="form-group"> 
		<div class="col-md-4">
			
			<button type="edit_users" class="btn btn-default" ><a href="<?php echo $page->link("edit_users"); ?>">Edit Users</a></button>
		</div>
	</div>

	<div class="form-group"> 
		<div class="col-md-4">
			<button type="show_categories" class="btn btn-default"><a href="<?php echo $page->link("show_categories"); ?>">Categories</button>
		</div>
	</div>

	<div class="form-group"> 
		<div class="col-md-4">
			<button type="blog_open" class="btn btn-default"><a href="<?php echo $page->link("blog_open"); ?>">Open Blog</button>
		</div>
	</div>

	<div class="form-group"> 
		<div class="col-md-4">
			<button type="blog_closed" class="btn btn-default"><a href="<?php echo $page->link("blog_closed", "errors"); ?>">Close Blog</button>
		</div>
	</div>

</form>

<?php
	$page->showFooter();
?>
 

