<?php
    $page = new Page("View Question");
    $page->showHeader();

?>

<div class = "container col-md-12">
	<div class="panel panel-primary">
  		<div class="panel-heading">
  			<div class="row">
  				<div class="col-sm-6">Sample Username</div>
  				<div class="col-sm-6 text-right">Date Here</div>
			</div>
  		</div>
  		<div class="panel-body">Question Content</div>
	</div>
	</div>
</div>

<hr COLOR="yellow" WIDTH="100%">

<div class="panel panel-info">
  <div class="panel-heading">
  	<div class="row">
  		<div class="col-sm-6">Sample Username</div>
  		<div class="col-sm-6 text-right">Date Here</div>
	</div>
  </div>
  <div class="panel-body">Sample Answer</div>
</div>

<div class="form-group">
  <label for="comment">Answer Question:</label>
  <textarea class="form-control" rows="5" id="comment"></textarea>
</div>

<div class="btn-group" role="group">
  <button type="button" class="btn btn-default">Submit</button>
</div>

<?php

	$page->showFooter();
	
?>