<?php
    $page = new Page("Category Here", $SessionPerson);
	$page->getModule("blogPost");
    $page->showHeader();

    if(!is_null($page->getQuery("id"))) {
		$id = $page->getQuery("id");
		$c = $Categories->get($id);

		?>

		<div class="container col-md-12">
			<div class="panel panel-default col-md-offset-4 col-md-4">
				<div class="panel-body text-center">
					<h2><?php echo $c["name"]; ?></h2>
				</div>
			</div>
		</div>

		<div class="container col-md-6">
			<?php  if($page->isAuth()) { ?>
				<a href="?page=new_post&id=<?php echo $c["id"]; ?>">Add Post</a>
				<br/>
			<?php } ?>
		<?php
			$posts = $BlogPosts->getAllFromCategoryId($id);
			if(count($posts) > 0) {
				foreach ($posts as $b) {
					$user = $Users->get($b["user_id"]);
					$ans = $b["correctAnswerId"] > 0;
					$opened = $b["marked"] == 0;
					if($opened || $page->isAdmin($Role))
						blogPost($b["id"], $b["title"], $user["first_name"], $user["last_name"], $b["date_posted"], $ans, $opened);
				}
			} else {
		?>
			<div class="panel">
				<div class="panel-body text-center">
					<div class="row">
						<p>There are no posts here.</p>
					</div>
				</div>
			</div>
		<?php
			}
		?>

		</div>

		<?php
		$page->getModule("categories");
		listCategories($Categories);


		$page->showFooter();
	} else {
		echo "error..";
	}
?>