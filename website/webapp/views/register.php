<?php
	$page = new Page("Registration");

	function printError($error) {
		if(isset($error) && $error != NULL) echo $error;
		else echo "";
	}

	if(isset($_POST["submit"])) {
		$email = $_POST["email"];
		$first_name = $_POST["first_name"];
		$last_name = $_POST["last_name"];
		$password = $_POST["password"];
		$reg = $People->register($email, $first_name, $last_name, $password, $password);
		if(count($reg[1]) > 0) {
			$Session->add("errors", $reg[1]);
			$Session->add("values", $reg[0]);
			unset($_POST);
			$page->redirect($page->currentURL());
		} else {
			$page->showHeader();
			echo "User Added. Please Log in.";
		}

	} else {
		$page->showHeader();
?>

		<form method="post" action="<?php echo $page->currentURL(); ?>" class="form-horizontal" role="form">

			<div class="form-group">
			</div>

			<div class="form-group">
				<label class="control-label col-md-offset-2 col-md-2" for="name">First name:</label>
				<div class="col-md-4">
					<input type="text" class="form-control" id="first_name" name="first_name" placeholder="First name" value="<?php echo $Session->get("values")["first_name"]; ?>">
					<div><?php  printError($Session->get("errors")["first_name"]); ?></div>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-offset-2 col-md-2" for="name">Last name:</label>

				<div class="col-md-4">
					<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last name" value="<?php echo $Session->get("values")["last_name"]; ?>">
					<div><?php echo $Session->get("errors")["last_name"]; ?></div>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-offset-2 col-md-2" for="email">Email:</label>

				<div class="col-md-4">
					<input type="email" class="form-control" id="email" placeholder="Enter TTU email" name="email" value="<?php echo $Session->get("values")["email"]; ?>">
					<span class="input-group-addon">@ttu.edu emails only</span>
					<div><?php echo $Session->get("errors")["email"]; ?></div>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-offset-2 col-md-2" for="password" id="password" value="<?php echo $Session->get("values")["password"]; ?>">Password:</label>

				<div class="col-md-4">
					<input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
					<span class="input-group-addon">We recommend not using your eRaider password</span>
					<div><?php echo $Session->get("errors")["password"]; ?></div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-offset-4 col-md-4">
					<input type="submit" class="btn btn-default btn-block" id="submit" name="submit" />
				</div>
			</div>
		</form>
<?php
		$Session->remove("errors");
		$Session->remove("values");
	}
	$page->showFooter();
?>