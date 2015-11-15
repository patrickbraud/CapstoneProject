<?php
    $page = new Page("New Post", $SessionPerson);
	$page->requireLogin();
	$id = $page->getQuery("id");
	$c = $Categories->get($id);
	$userId = $SessionPerson->id();

	if(isset($_POST["submit"])) {
		$title = $_POST["title"];
		$body = $_POST["body"];
		$now = date("o-m-d");

		$BlogPosts->add($title, $body, 0, $id, $userId, $now, 0);
		$p =  QUESTION_POINTS;
		$SessionPerson->removePoints(QUESTION_POINTS);
		$page->addQuery("id", $id);
		$page->changeQuery("page", "category_questions");
		$page->redirect();
		exit;
	} else {
		$page->showHeader();
		if($People->getPoints($userId) >= QUESTION_POINTS) {
			?>

			<div class="container col-md-12 text-center col-md-offset-1 col-md-10">
				<h2><?php echo $c["name"]; ?></h2>
			</div>
			<form action="<?php echo $page->currentURL(); ?>" method="post">
				<div class="container col-md-offset-1 col-md-12">
					<div class="form-group col-md-10">
						<label for="comment">Title:</label>
						<input type="input" name="title" class="form-control" id="title"/>
					</div>

					<div class="form-group col-md-10">
						<label for="comment">Body:</label>
						<textarea class="form-control" rows="5" id="body" name="body"></textarea>
					</div>
				</div>

				<div class="container col-md-offset-1 col-md-2">
					<div class="btn-group col-md-offset-1" role="group">
						<input type="submit" id="submit" name="submit" value="Post" class="btn btn-default"/>
					</div>
					<p><br></p>
				</div>
			</form>


			<?php
		} else {
			?>
				<div class="container col-md-12">
					<p>You do not have enough points to post.</p>
				</div>
			<?php
		}
	}
    $page->showFooter();
?>