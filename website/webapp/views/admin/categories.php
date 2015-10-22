<?php
	$page = new Page("Edit Categories Page", $SessionPerson);
	$page->requireAdmin($Role);

	if(!is_null($page->getQuery("id"))) {
		$page->showHeader();
	?>
		<form class="form-horizontal" role="form" method="post" action="<?php echo $page->currentURL(); ?>">

			<div class="form-group">
			</div>

			<div class="form-group">
				<label class="control-label col-md-offset-2 col-md-2" for="name">Email:</label>

				<div class="col-md-4">
					<input type="name" class="form-control" name="name" id="name" placeholder="Enter TTU email"
						   aria-describedby="basic-addon2">
				</div>
			</div>


			<div class="form-group">
				<div class="col-md-offset-4">
					<div class="col-md-6">
						<button type="register" class="btn btn-default btn-block">New user? Click here to register
						</button>
					</div>
				</div>
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