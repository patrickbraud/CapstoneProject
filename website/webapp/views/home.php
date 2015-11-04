<?php
    $page = new Page("Home", $SessionPerson);
    $page->showHeader();

    if($page->isAdmin($Role)) {
       echo "<a href=".$page->link("home", "admin").">Admin Panel</a>";
    }

    /*
    * TODO: get the two newest posts from each category..
    */
?>
    
  	<div class="container col-md-12">
		<div class="panel panel-default col-md-offset-4 col-md-4">
			<div class="panel-body text-center">
				<h2><?php echo $page->getTitle(); ?></h2>
			</div>
		</div>
	</div>

	<?php
	$page->getModule("categories");
    listCategories($Categories);
?>

	<div class="container col-md-6">
		<div class="row">
			<h3>
				<div>
					<a href="">Post Title</a>
					<br/>
				</div>
			</h3>
			<h4>
				<div>
					<a href="">Category</a>
				</div>
			</h4>
			<p class="lead">by: Name Here</p>

			<p><span class="glyphicon glyphicon-time"> Date Here <!--</span> <?php echo $b["date_posted"]; ?> --></p>
			<hr>
		</div>
	</div>

	<div class="container col-md-6">
		<div class="row">
			<h3>
				<div>
					<a href="">Post Title</a>
					<br/>
				</div>
			</h3>
			<h4>
				<div>
					<a href="">Category</a>
				</div>
			</h4>
			<p class="lead">by: Name Here</p>

			<p><span class="glyphicon glyphicon-time"> Date Here <!--</span> <?php echo $b["date_posted"]; ?> --></p>
			<hr>
		</div>
	</div>

	<div class="container col-md-6">
		<div class="row">
			<h3>
				<div>
					<a href="">Post Title</a>
					<br/>
				</div>
			</h3>
			<h4>
				<div>
					<a href="">Category</a>
				</div>
			</h4>
			<p class="lead">by: Name Here</p>

			<p><span class="glyphicon glyphicon-time"> Date Here <!--</span> <?php echo $b["date_posted"]; ?> --></p>
			<hr>
		</div>
	</div>
    
    
    
    

<?php
    $page->showFooter();
?>