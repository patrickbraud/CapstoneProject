<?php
	$page = new Page("Edit Users Page", $SessionPerson);
	$page->requireAdmin($Role);

	function isSelected($value, $checkAgainst) {
		if($value == $checkAgainst) return "selected";
		else return "";
	}

	if(!is_null($page->getQuery("delete"))) {
		$id = $page->getQuery("id");
		$Users->remove($id);
		$Session->add("users_msg", "User Deleted.");
		$page->removeQuery("delete");
		$page->removeQuery("id");
		$page->redirect();
	} else if(!is_null($page->getQuery("edit"))) {
		if (isset($_POST["submit"])) {
			$id = $page->getQuery("id");
			$Users->update($id, $_POST["first_name"], $_POST["last_name"], $_POST["email"], $_POST["role_id"]);
			$Session->add("users_msg", "User Updated.");
			$page->removeQuery("edit");
			$page->removeQuery("id");
			$page->redirect();
		}

		$page->showHeader();
		$id = $page->getQuery("id");
		$u = $Users->get($id);

	?>
				<form class="form-horizontal" role="form" method="post" action="<?php echo $page->currentURL(); ?>">

					<div class="form-group">
						<label class="control-label col-md-offset-2 col-md-2" for="first_name">First Name:</label>

						<div class="col-md-4">
							<input type="name" class="form-control" name="first_name" id="first_name" value="<?php echo $u["first_name"]; ?>" aria-describedby="basic-addon2">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-offset-2 col-md-2" for="last_name">Last Name:</label>

						<div class="col-md-4">
							<input type="name" class="form-control" name="last_name" id="last_name" value="<?php echo $u["last_name"]; ?>" aria-describedby="basic-addon2">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-offset-2 col-md-2" for="email">Email:</label>

						<div class="col-md-4">
							<input type="name" class="form-control" name="email" id="email" value="<?php echo $u["email"]; ?>" aria-describedby="basic-addon2">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-offset-2 col-md-2" for="role">Role:</label>

						<div class="col-md-4">
							<select id="role_id" name="role_id">
								<option value="<?php echo USER_ROLE; ?>" <?php echo isSelected(USER_ROLE, $u["role_id"]); ?>>User</option>
								<option value="<?php echo STAFF_ROLE; ?>" <?php echo isSelected(STAFF_ROLE, $u["role_id"]); ?>>Faculty</option>
								<option value="<?php echo ADMIN_ROLE; ?>" <?php echo isSelected(ADMIN_ROLE, $u["role_id"]); ?>>Admin</option>
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
		if (!is_null($Session->get("users_msg"))) echo $Session->get("users_msg")."<br />";
		echo '<a href="' . $page->link("home", "admin") . '">Admin Home</a>';
		?>

		<form classs="form-horizontal" role="form">

			<div class="form-group">
				<div class="col-md-4">

					<div class="container">
						<table class="table table-bordered">
							<thead>
							<tr>
								<th>Edit User</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Email</th>
								<th>Role</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($Users->getAll() as $u) { ?>
								<tr>
									<td><a href="?page=users&prefix=admin&edit=1&id=<?php echo $u["id"]; ?>">Edit</a>, <a href="?page=users&prefix=admin&delete=1&id=<?php echo $u["id"]; ?>">Delete</a></td>
									<td><?php echo $u["first_name"]; ?></td>
									<td><?php echo $u["last_name"]; ?></td>
									<td><?php echo $u["email"]; ?></td>
									<td><?php echo $Role->getRoleName($u["role_id"]); ?></td>
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