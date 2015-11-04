<?php
    $page = new Page("Category Here", $SessionPerson);
	$page->getModule("blogPost");
    $page->showHeader();

	$pagen = $page->getQuery("number");
	if(!isset($pagen)) $pagen = 1;

	$itemsPerPage = 10;
	$offset = ($pagen * $itemsPerPage) - $itemsPerPage;

    if(!is_null($page->getQuery("id"))) {
		$id = $page->getQuery("id");
		$c = $Categories->get($id);

		?>

		<div class="container col-md-12">
			<div class="panel-body text-center">
				<h2><?php echo $c["name"]; ?></h2>
			</div>
		</div>

		<div class="container col-md-12" style="margin-bottom: 10px;">
			<?php  if($page->isAuth()) { ?>
				<button type="button button" class="btn btn-default pull-right">
					<a href="?page=new_post&id=<?php echo $c["id"]; ?>">Add Post<a/>
				</button>
			<?php } ?>
		</div>
		<div class="container col-md-6">

		<?php
			$posts = $BlogPosts->getAllFromCategoryId($id, $itemsPerPage, $offset);
			$count = count($posts);
			if($count > 0) {
				foreach ($posts as $b) {
					$user = $Users->get($b["user_id"]);
					$ans = $b["correctAnswerId"] > 0;
					$opened = $b["marked"] == 0;
					if($opened || $page->isAdmin($Role))
						blogPost($b["id"], $b["title"], $user["first_name"], $user["last_name"], $b["date_posted"], $ans, $opened);
				}
				if($count >= $itemsPerPage) {
					$p =  $page->getURL() . "?". $page->getQueryString();
					?>
					<ul class="pager">
						<li class="previous"><a href="<?php echo $p .  "&number=" .($pagen-1) ?>">&larr; Newer</a></li>
						<li class="next"><a href="<?php echo $p .  "&number=" .($pagen +1) ?>">Older &rarr;</a></li>
					</ul>
					<?php
				}
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
		$page->getModule("categories");
		listCategories($Categories);


		$page->showFooter();
	} else {
		echo "error..";
	}
?>