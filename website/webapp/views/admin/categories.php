<?php
	$page = new Page("Edit Categories Page", $SessionPerson);
	$page->requireAdmin($Role);


	function isSelected($value, $checkAgainst) {
		if($value == $checkAgainst) return "selected";
		else return "";
	}

	if(!is_null($page->getQuery("delete"))) {
		$id = $page->getQuery("delete");
		$Categories->remove($id);
		$Session->add("cate_msg", "Category Deleted");
		$page->removeQuery("delete");
		$page->redirect();

	} else if(!is_null($page->getQuery("add"))) { //Add a Category
		if(isset($_POST["submit"])) {
			$Categories->add($_POST["name"], $_POST["view"], $_POST["comment"], $_POST["post"]);
			$Session->add("cate_msg", "Category Added.");
			$page->removeQuery("add");
			$page->redirect();
		}
		$page->showHeader();
		echo '<a href="' . $page->link("home", "admin") . '">Admin Home</a>';
	?>
		<form class="form-horizontal" role="form" method="post" action="<?php echo $page->currentURL(); ?>">


			<div class="form-group">
				<label class="control-label col-md-offset-2 col-md-2" for="name">Category Name:</label>

				<div class="col-md-4">
					<input type="name" class="form-control" name="name" id="name" value="" aria-describedby="basic-addon2">
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-offset-2 col-md-2" for="name">Post Permission:</label>

				<div class="col-md-4">
					<select id="post" name="post">
						<option value="<?php echo USER_ROLE; ?>">User</option>
						<option value="<?php echo STAFF_ROLE; ?>">Faculty</option>
						<option value="<?php echo ADMIN_ROLE; ?>">Admin</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-offset-2 col-md-2" for="name">View Permission:</label>

				<div class="col-md-4">
					<select id="view" name="view">
						<option value="<?php echo GUEST_ROLE; ?>">Guest</option>
						<option value="<?php echo USER_ROLE; ?>">User</option>
						<option value="<?php echo STAFF_ROLE; ?>">Faculty</option>
						<option value="<?php echo ADMIN_ROLE; ?>">Admin</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-offset-2 col-md-2" for="name">Comment Permission:</label>

				<div class="col-md-4">
					<select id="comment" name="comment">
						<option value="<?php echo USER_ROLE; ?>">User</option>
						<option value="<?php echo STAFF_ROLE; ?>">Faculty</option>
						<option value="<?php echo ADMIN_ROLE; ?>">Admin</option>
					</select>
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

	} else if (!is_null($page->getQuery("id"))) { //Update a Category
			$id = $page->getQuery("id");
			if (isset($_POST["submit"])) {
				$Categories->update($id, $_POST["name"], $_POST["view"], $_POST["comment"], $_POST["post"]);
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
					<label class="control-label col-md-offset-2 col-md-2" for="name">Category Name:</label>

					<div class="col-md-4">
						<input type="name" class="form-control" name="name" id="name" value="<?php echo $c["name"]; ?>" aria-describedby="basic-addon2">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-offset-2 col-md-2" for="name">Post Permission:</label>

					<div class="col-md-4">
						<select id="post" name="post">
							<option value="<?php echo USER_ROLE; ?>" <?php echo isSelected(USER_ROLE, $c["post"]); ?>>User</option>
							<option value="<?php echo STAFF_ROLE; ?>" <?php echo isSelected(STAFF_ROLE, $c["post"]); ?>>Faculty</option>
							<option value="<?php echo ADMIN_ROLE; ?>" <?php echo isSelected(ADMIN_ROLE, $c["post"]); ?>>Admin</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-offset-2 col-md-2" for="name">View Permission:</label>

					<div class="col-md-4">
						<select id="view" name="view">
							<option value="<?php echo GUEST_ROLE; ?>" <?php echo isSelected(GUEST_ROLE, $c["view"]); ?>>Guest</option>
							<option value="<?php echo USER_ROLE; ?>" <?php echo isSelected(USER_ROLE, $c["view"]); ?>>User</option>
							<option value="<?php echo STAFF_ROLE; ?>" <?php echo isSelected(STAFF_ROLE, $c["view"]); ?>>Faculty</option>
							<option value="<?php echo ADMIN_ROLE; ?>" <?php echo isSelected(ADMIN_ROLE, $c["view"]); ?>>Admin</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-offset-2 col-md-2" for="name">Comment Permission:</label>

					<div class="col-md-4">
						<select id="comment" name="comment">
							<option value="<?php echo USER_ROLE; ?>" <?php echo isSelected(USER_ROLE, $c["comment"]); ?>>User</option>
							<option value="<?php echo STAFF_ROLE; ?>" <?php echo isSelected(STAFF_ROLE, $c["comment"]); ?>>Faculty</option>
							<option value="<?php echo ADMIN_ROLE; ?>" <?php echo isSelected(ADMIN_ROLE, $c["comment"]); ?>>Admin</option>
						</select>
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
			if (!is_null($Session->get("cate_msg"))) { //Default Page.
				echo $Session->get("cate_msg") ."<br />";
			}
			echo '<a href="' . $page->link("home", "admin") . '">Admin Home</a>';
			?>


		<form classs="form-horizontal" role="form">

			<div class="form-group">
				<div class="col-md-4">

					<div class="container">
						<table class="table table-bordered">
							<thead>
							<tr>
								<th>Delete</th>
								<th>Name</th>
								<th>Post Permission</th>
								<th>View Permission</th>
								<th>Comment Permission</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($Categories->getAll() as $c) { ?>
								<tr>
									<td><a href="<?php echo $page->link("categories", "admin") . "&delete=" . $c["id"]; ?>">Delete</a></td>
									<td><a href="<?php echo $page->link("categories", "admin") . "&id=" . $c["id"]; ?>"><?php echo $c["name"]; ?></a></td>
									<td><?php echo $Role->getRoleName($c["post"]); ?></td>
									<td><?php echo $Role->getRoleName($c["view"]); ?></td>
									<td><?php echo $Role->getRoleName($c["comment"]); ?></td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</form>

			<?php
	}
	$page->showFooter();
?>