<?php
	$page = new Page("Edit Categories Page", $SessionPerson);
	$page->requireAdmin($Role);

	if(!is_null($page->getQuery("delete"))) {
		$id = $page->getQuery("delete");
		$Categories->remove($id);
		$Session->add("cate_msg", "Category Deleted");
		$page->removeQuery("delete");
		$page->redirect();

	} else if(!is_null($page->getQuery("add"))) {
		if(isset($_POST["submit"])) {
			$Categories->add($_POST["name"]);
			$Session->add("cate_msg", "Category Added.");
			$page->removeQuery("add");
			$page->redirect();
		}
		$page->showHeader();
		echo '<a href="' . $page->link("home", "admin") . '">Admin Home</a>';
	?>
		<form class="form-horizontal" role="form" method="post" action="<?php echo $page->currentURL(); ?>">

			<div class="form-group">
			</div>

			<div class="form-group">
				<label class="control-label col-md-offset-2 col-md-2" for="name">Category Name:</label>

				<div class="col-md-4">
					<input type="name" class="form-control" name="name" id="name" value="" aria-describedby="basic-addon2">
				</div>
			</div>


			<div class="form-group">
				<div class="col-md-offset-4">
					<div class="col-md-6">
						<input type="submit" class="btn btn-default btn-block" id="submit" name="submit" value="Add"/>
					</div>
				</div>
			</div>
		</form>
	<?php

	} else if (!is_null($page->getQuery("id"))) {
			$id = $page->getQuery("id");
			if (isset($_POST["submit"])) {
				$Categories->update($id, $_POST["name"]);
				$Session->add("cate_msg", "Updated Category");
				$page->removeQuery("id");
				$page->redirect();
			}
			$c = $Categories->get($id);
			$page->showHeader();
			echo '<a href="' . $page->link("home", "admin") . '">Admin Home</a>';
			?>
			<form class="form-horizontal" role="form" method="post" action="<?php echo $page->currentURL(); ?>">

				<div class="form-group">
				</div>

				<div class="form-group">
					<label class="control-label col-md-offset-2 col-md-2" for="name">Category Name:</label>

					<div class="col-md-4">
						<input type="name" class="form-control" name="name" id="name" value="<?php echo $c["name"]; ?>" aria-describedby="basic-addon2">
					</div>
				</div>


				<div class="form-group">
					<div class="col-md-offset-4">
						<div class="col-md-6">
							<input type="submit" class="btn btn-default btn-block" id="submit" name="submit" value="Edit"/>
						</div>
					</div>
				</div>
			</form>

			<?php
		} else {
			$page->showHeader();
			if (!is_null($Session->get("cate_msg"))) {
				echo $Session->get("cate_msg");
			}
			echo '<a href="' . $page->link("home", "admin") . '">Admin Home</a>';
			?>
			<form class="form-horizontal" role="form">
				<div class="form-group">
				</div>

				<div class="form-group">
					<h2>Categories</h2>
					<button type="add_category" class="btn btn-default">
						<a href="<?php echo $page->currentURL() . "&add=true" ?>">Add Category</a>
					</button>
				</div>
			</form>

			<div class="list-group">
				<?php
				foreach ($Categories->getAll() as $c) {
					?>
					<button type="button" class="list-group-item">
						<a href="<?php echo $page->link("categories", "admin") . "&id=" . $c["id"]; ?>"><?php echo $c["name"]; ?></a>
						[<a href="<?php echo $page->link("categories", "admin") . "&delete=" . $c["id"]; ?>">Delete</a>]
					</button>
					<?php
				}
				?>
			</div>

			<?php
	}
	$page->showFooter();
?>