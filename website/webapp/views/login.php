<?php
	$page = new Page("Log In");
	$page->showHeader();
?>

<form class="form-horizontal" role="form">

	<div class="form-group">
    </div>

	<div class="form-group">
		<label class="control-label col-sm-offset-2 col-sm-2" for="email">TTU email:</label>
		<div class="col-sm-4">
			<input type="email" class="form-control" id="email" placeholder="Enter TTU email" aria-describedby="basic-addon2">
			<span class="input-group-addon" id="basic-addon2">@ttu.edu</span>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-offset-2 col-sm-2" for="pwd">Password:</label>
		<div class="col-sm-4"> 
			<input type="password" class="form-control" id="pwd" placeholder="Enter password" aria-describedby="basic-addon2">
			<span class="input-group-addon" id="basic-addon2">We recommend not using your eRaider password</span>
			<button type="login" class="btn btn-default">Login</button>
		</div>
	</div>

	<div class="form-group"> 
		<div class="col-sm-offset-4 col-sm-4">
			<span class="input-group-addon" id="basic-addon2">New user? Click here to register</span>
			<button type="register" class="btn btn-default">Register</button>
		</div>
	</div>

</form>

<?php
	$page->showFooter();
?>



