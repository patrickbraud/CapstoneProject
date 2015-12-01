<?php
    $page = new Page("Category Here", $SessionPerson);

	$page->getModule("blogPost");
    $page->getModule("pagination");
	$page->getModule("categories");

	$page->showHeader();

	$number = $page->getQuery("number");
	if(!isset($number)) $number = 1;

	$offset = calcOffset($number);

    if(!is_null($page->getQuery("id")) && $Categories->allowedToView($page->getQuery("id"), $SessionPerson->role())) {
		$id = $page->getQuery("id");
		$c = $Categories->get($id);


		?>

		<div class="container col-md-12">
			<div class="panel-body text-center">
				<h2><?php echo $c["name"]; ?></h2>
			</div>
		</div>

		<div class="container col-md-12" style="margin-bottom: 10px;">
			<?php  if($page->isAuth() && $c["post"] <= $SessionPerson->role()) { ?>
				<button type="button button" class="btn btn-default pull-right">
					<a href="?page=new_post&id=<?php echo $c["id"]; ?>">Add Post<a/>
				</button>
			<?php } ?>
		</div>
		<div class="container col-md-6">

		<?php
			$posts = $BlogPosts->getAllFromCategoryId($id, ITEMS_PER_PAGE, $offset);
			$count = count($posts);
			if($count > 0) {
				foreach ($posts as $b) {
					$user = $Users->get($b["user_id"]);
					$ans = $b["correctAnswerId"] > 0;
					$opened = $b["marked"] == 0;
					if($opened || $page->isAdmin($Role))
						blogPost($b["id"], $b["title"], $user["id"], $user["first_name"], $user["last_name"], $b["date_posted"], $ans, $opened);
				}
				pagination($number, $count, $page);
			} else {
		?>
			<div class="panel panel-default">
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
		listCategories($Categories, $SessionPerson->role());


		$page->showFooter();
	} else {
		echo "You do not have permissions to view this page.";
	}
?>