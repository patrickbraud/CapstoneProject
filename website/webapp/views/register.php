<?php
	$page = new Page("Registration");
	$page->showHeader();
?>

<form class="form-horizontal" role="form">

	<div class="form-group">
    </div>

    <div class="form-group">
		<label class="control-label col-sm-offset-2 col-sm-2" for="name">First name:</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="first_name" placeholder="First name">
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-offset-2 col-sm-2" for="name">Last name:</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="last_name" placeholder="Last name">
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-offset-2 col-sm-2" for="email">TTU email:</label>
		<div class="col-sm-4">
			<input type="email" class="form-control" id="email" placeholder="Enter TTU email">
			<span class="input-group-addon">@ttu.edu</span>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-offset-2 col-sm-2" for="password">Password:</label>
		<div class="col-sm-4"> 
			<input type="password" class="form-control" id="password" placeholder="Enter password">
			<span class="input-group-addon">We recommend not using your eRaider password</span>
		</div>
	</div>

	<div class="form-group"> 
		<div class="col-sm-offset-4 col-sm-10">
		  <button type="submit" class="btn btn-default">Submit</button>
		</div>
	</div>
</form>

<?php
	$page->showFooter();
?>



