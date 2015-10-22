<?php
	$page = new Page("Edit Categories Page", $SessionPerson);
	$page->requireAdmin($Role);
	$page->showHeader();
?>

 <div class="container col-md-offset-1 col-md-10"<
 	<div class="form-group col-md-10">
	  	<label for="comment">Title:</label>
	  	<textarea class="form-control" rows="2" id="title"></textarea>
	</div>
</div>

<div class="container col-md-offset-1 col-md-2">
	  	<div class="btn-group col-md-offset-1" role="group"> 
			<button type="submit" class="btn btn-default">Submit</button>
		</div>
	</div>
	<p><br></p>
</div>

<?php
	
	//need to add href to each button into DB categories
	$page->showFooter();
?>