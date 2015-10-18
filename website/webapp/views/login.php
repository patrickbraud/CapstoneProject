<?php
	$page = new Page("Log In");
	$page->showHeader();
?>

<form class="form-horizontal" role="form">

	<div class="form-group">
    </div>

	<div class="form-group">
		<label class="control-label col-md-offset-2 col-md-2" for="email">Email:</label>
		<div class="col-md-4">
			<input type="email" class="form-control" id="email" placeholder="Enter TTU email" aria-describedby="basic-addon2">
			<span class="input-group-addon" id="basic-addon2">@ttu.edu</span>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-offset-2 col-md-2" for="pwd">Password:</label>
		<div class="col-md-4"> 
			<input type="password" class="form-control" id="password" placeholder="Enter password" aria-describedby="basic-addon2">
			<button type="login" class="btn btn-default btn-block">Login</button>
		</div>
	</div>

	<div class="form-group"> 
		<div class="col-md-offset-4">
			<div class="col-md-6">
				<button type="register" class="btn btn-default btn-block">New user? Click here to register</button>
			</div>
		</div>
	</div>
</form>

<?php
	$page->showFooter();
?>