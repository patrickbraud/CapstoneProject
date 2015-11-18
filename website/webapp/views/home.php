<?php
    $page = new Page("Home", $SessionPerson);

	$page->getModule("categories");
	$page->getModule("blogPost");
    $page->showHeader();

    if($page->isAdmin($Role)) {
       echo "<a href=".$page->link("home", "admin").">Admin Panel</a>";
    }

?>
    
  	<div class="container col-md-12">
		<div class="panel-body text-center">
			<!--<h2><?php echo $page->getTitle(); ?></h2>-->

			<img src="<?php echo $page->getAsset("images/Home_Logo.png"); ?>" alt="home">
		</div>
	</div>

	<?php
    	listCategories($Categories, $SessionPerson->role());
	?>

	<div class="container col-md-6">
		<?php
			foreach($Categories->getAll() as $c) {
				foreach($BlogPosts->getAllFromCategoryId($c["id"], 1) as $b) {
					$u = $Users->get($b["user_id"]);
					$ans = $b["correctAnswerId"] > 0;
					$opened = $b["marked"] == 0;
					if($b["marked"] == 0 || $page->isAdmin($Role))
						blogPostWithCategory($b["id"], $b["title"], $u["id"], $u["first_name"], $u["last_name"], $b["date_posted"], $c["id"], $c["name"], $ans, $opened);
				}
			}
		?>
	</div>

<?php
    $page->showFooter();
?>