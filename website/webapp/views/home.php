<?php
    $page = new Page("Home", $SessionPerson);
    $page->showHeader();

    if($page->isAdmin($Role)) {
       echo "<a href=".$page->link("home", "admin").">Admin Panel</a>";
    }
?>
    
  	<div class="container col-md-12">
		<div class="panel panel-default col-md-offset-4 col-md-4">
			<div class="panel-body text-center">
				<h2>Home Page Title Here</h2>
			</div>
		</div>
	</div>

	<div class="container col-md-6">
		<div class="row">
			<h2>
				<div>
					<a href="">Category</a>
					<hr>
				</div>
			</h2>
			<h3>
				<div>
					<a href="">Post Title</a>
					<br/>
				</div>
			</h3>
			<p class="lead">by: Name Here</p>

			<p><span class="glyphicon glyphicon-time"> Date Here <!--</span> <?php echo $b["date_posted"]; ?> --></p>
			<hr>
			<hr>
		</div>
	</div>

<?php
	$page->getModule("categories");
    listCategories($Categories);
?>
    
    
    
    

<?php
    $page->showFooter();
?>