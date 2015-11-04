<?php
    $page = new Page("Home", $SessionPerson);

	$page->getModule("categories");
	$page->getModule("blogPost");
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
    	listCategories($Categories);
	?>

	<div class="container col-md-6">
		<?php
			foreach($Categories->getAll() as $c) {
				foreach($BlogPosts->getAllFromCategoryId($c["id"], 1) as $b) {
					$u = $Users->get($b["user_id"]);
					orm($b["id"], $b["title"], $u["first_name"], $u["last_name"], $b["date_posted"], $c["id"], $c["name"]);
				}
			}
		?>
	</div>

<?php
    $page->showFooter();
?>