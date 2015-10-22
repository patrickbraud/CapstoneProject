<?php
    $page = new Page("Category Here", $SessionPerson);
	$page->requireLogin();
    $page->showHeader();

    
?>

<div class = "container col-md-12">
	<div class="panel panel-default col-md-offset-4 col-md-4">
  		<div class="panel-body text-center">
    		<h2>Category Here</h2>
  		</div>
	</div>
</div>

<div class = "container col-md-6">
	<div class = "row">
		<h3>
			<div>
        		<a href="#"> title</a>
        		<br />
    		</div>
		</h3>
		<p class="lead">by <a href="index.php">author</a></p>
		<p><span class="glyphicon glyphicon-time"></span> Posted on date</p>
		<hr>
	</div>
	
	<div class = "row">
		<h3>
			<div>
        		<a href="#"> title</a>
        		<br />
    		</div>
		</h3>
		<p class="lead">by <a href="index.php">author</a></p>
		<p><span class="glyphicon glyphicon-time"></span> Posted on date</p>
		<hr>
	</div>
	
	<div class = "row">
		<h3>
			<div>
        		<a href="#"> title</a>
        		<br />
    		</div>
		</h3>
		<p class="lead">by <a href="index.php">author</a></p>
		<p><span class="glyphicon glyphicon-time"></span> Posted on date</p>
		<hr>
	</div>
	
	
</div>

<div class = "container col-md-offset-2 col-md-3 pull-right">
	<div class="well well-lg">
		<a href="#">AI</a><br />
		<a href="#">Big Data</a><br />
		<a href="#">Computer Architecture</a><br />
		<a href="#">Computer Engineering</a><br />
		<a href="#">Computer Graphics</a><br />
		<a href="#">Computer Networks</a><br />
		<a href="#">Data Structures</a><br />
		<a href="#">Discrete Mathematics</a><br />
		<a href="#">File Sharing</a><br />
		<a href="#">Hacking</a><br />
		<a href="#">History of Computer Science</a><br />
		<a href="#">Human Computer Interaction</a><br />
		<a href="#">Machine Learning</a><br />
		<a href="#">Programming</a><br />
		<a href="#">Robotics</a><br />
		<a href="#">Security</a><br />
		<a href="#">Software Engineering</a><br />
		<a href="#">Theory of Computation</a><br />
	</div>
</div>
	
<div class = "container col-md-12">
<?php
	echo pager();
?>
</div>

<?php
	
    $page->showFooter();
?>