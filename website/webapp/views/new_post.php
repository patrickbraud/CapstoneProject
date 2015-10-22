<?php
    $page = new Page("New Post", $SessionPerson);
	$page->requireLogin();
    $page->showHeader();

?>

<div class = "container col-md-12">
	<div class="panel panel-default col-md-offset-1 col-md-10">
  		<div class="panel-body text-center">
    		<h2>Category Here</h2>
  		</div>
	</div>
</div>

<div class = "container col-md-offset-1 col-md-12">
	<div class="form-group col-md-10">
  		<label for="comment">Title:</label>
  		<textarea class="form-control" rows="1" id="title"></textarea>
	</div>
	
	<div class="form-group col-md-10">
  		<label for="comment">Body:</label>
  		<textarea class="form-control" rows="5" id="body"></textarea>
	</div>
</div>

<div class = "container col-md-offset-1 col-md-2">
	<div class="btn-group col-md-offset-1" role="group">
  		<button type="button" class="btn btn-default">Post</button>
	</div>
	<p> <br> </p>
</div>



<?php
	
    $page->showFooter();
?>