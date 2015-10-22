<?php
    $page = new Page("Category Here", $SessionPerson);
	$page->requireLogin();
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
			<a href="#">Add Post</a>
		<?php
			$posts = $BlogPosts->getAllFromCategoryId($id);
			if(count($posts) > 0) {
				foreach ($posts as $b) {
					$user = $Users->get($b["user_id"]);
		?>
					<div class="row">
						<h3>
							<div>
								<a href="?page=question&id=<?php echo $b["id"]; ?>"><?php echo $b["title"]; ?></a>
								<br/>
							</div>
						</h3>
						<p class="lead">by <?php echo $user["first_name"]." ".$user["last_name"]; ?></p>

						<p><span class="glyphicon glyphicon-time"></span> <?php echo $b["date_posted"]; ?></p>
						<hr>
					</div>
		<?php
				}
			} else {
		?>
					<div class="row">
						<p>There is no post here.</p>
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