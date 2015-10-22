<?php
	$page = new Page("Edit Categories Page", $SessionPerson);
	$page->requireAdmin($Role);

	if(!is_null($page->getQuery("id"))) {
		$page->showHeader();
	?>
		<form class="form-horizontal" role="form">
			<div class="form-group">
			</div>

			<div class="form-group">
				<h2>Categories</h2>

			</div>
		</form>

	<?php
	} else {
		$page->showHeader();
		?>
		<form class="form-horizontal" role="form">
			<div class="form-group">
			</div>

			<div class="form-group">
				<h2>Categories</h2>
				<button type="add_category" class="btn btn-default">Add Category</button>
			</div>
		</form>

		<div class="list-group">
			<?php
			foreach ($Categories->getAll() as $c) {
				?>
				<button type="button" class="list-group-item">
					<a href="<?php echo $page->link("categories", "admin") . "&id=" . $c["id"]; ?>"><?php echo $c["name"]; ?></a>
				</button>
				<?php
			}
			?>
		</div>

		<?php
	}
	//need to add href to each button into DB categories
	$page->showFooter();
?>