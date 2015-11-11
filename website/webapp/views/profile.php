<?php
    $page = new Page("Home", $SessionPerson);
	$page->getModule("categories");
	$page->getModule("blogPost");
	$page->getModule("pagination");

	$id = $page->getQuery("id");
	$points = 0;
	$email = "";
	$firstName = "";
	$lastName = "";

	if(!is_null($id)) { //Look up user
		$u = $Users->get($id);
		$firstName = $u["first_name"];
		$lastName = $u["last_name"];
		$points = $u["points"];
		$email = $u["email"];
	} else { //Use Session Person :)
		$id = $SessionPerson->id();
		$firstName = $SessionPerson->first_name();
		$lastName = $SessionPerson->last_name();
		$points = $SessionPerson->points();
		$email = $SessionPerson->email();
	}

    $page->showHeader();
?>

    
  	<div class="container col-md-8">
		<div class="panel-body text-center">
			<img src="Tech_Logo.png" alt="" width="80" height="80">
			<br /><a href="#">Change Profile Picture?</a>
			<h2><?php echo $firstName." ".$lastName; ?> : <?php echo $points; ?> </h2>
			<h3><?php echo $email; ?></h3>
		</div>
	</div>

<?php
    listCategories($Categories);
?>

<div class="container col-md-8">
	<?php
		foreach($BlogPosts->getAllForUser($id) as $b) {
			$categoryName = $Categories->get($b["category"])["name"];
			$ans = $b["correctAnswerId"] > 0;
			$opened = $b["marked"] == 0;
			if($opened || $page->isAdmin($Role))
				blogPostWithCategory($b["id"], $b["title"], $firstName, $lastName, $b["date_posted"], $b["category"], $categoryName, $ans, $opened);
		}
	?>
</div>

<?php
    $page->showFooter();
?>