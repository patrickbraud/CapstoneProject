<?php
	$page = new Page("Log In");

	if(isset($_POST["submit"])) {
		$email = $_POST["email"];
		$password = $_POST["password"];
		$Session->remove("error");

		if($SessionPerson->login($email, $password)) {
			$page->changeQuery("page", LANDING_PAGE);
			$page->redirect();
			exit;
		} else {
			$Session->add("error", "Incorrect Username or password.");
			$page->redirect($page->currentURL());
		}
	} else {
		$page->showHeader();
		?>
		<div>
			<?php
				echo $Session->get("error");
			?>
		</div>

		<form class="form-horizontal" role="form" method="post" action="<?php echo $page->currentURL(); ?>">

			<div class="form-group">
			</div>

			<div class="form-group">
				<label class="control-label col-md-offset-2 col-md-2" for="email">Email:</label>

				<div class="col-md-4">
					<input type="email" class="form-control" name="email" id="email" placeholder="Enter TTU email"
						   aria-describedby="basic-addon2">
					<span class="input-group-addon" id="basic-addon2">@ttu.edu</span>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-offset-2 col-md-2" for="pwd">Password:</label>

				<div class="col-md-4">
					<input type="password" id="password" name="password" class="form-control" id="password"
						   placeholder="Enter password" aria-describedby="basic-addon2">
					<input type="submit" class="btn btn-default btn-block" id="submit" name="submit" value="Login"/>
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
	}
	$page->showFooter();
?>