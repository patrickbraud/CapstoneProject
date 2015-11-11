<?php
    $page = new Page("Home", $SessionPerson);
	$page->getModule("categories");
	$page->getModule("blogPost");
	$page->getModule("pagination");
?>
	<div class="container col-md-12">
		<div class="panel-body">
			<h1/>
		</div>
	</div>
<?php
	if(isset($_POST["submit"])) {
		//upload dat picture.
		print_r($_POST);
	} else {
		$id = $page->getQuery("id");
		$points = 0;
		$email = "";
		$firstName = "";
		$lastName = "";
		$number = $page->getQuery("number");
		if (!isset($number)) $number = 1;
		$offset = calcOffset($number);
		if (!is_null($id)) { //Look up user
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
				<?php
					$ua = new UserAvatar($id);
					echo $ua->getImage(80, 80);
				?>
				<br/>
				<form method="post" enctype="multipart/form-data">
					<input type="file" name="avatar" id="avatar" value="Upload Avatar" />
					<input type="submit" name="submit" id="submit" value="Upload" />
				</form>

				<h2><?php echo $firstName . " " . $lastName; ?> : <?php echo $points; ?> </h2>

				<h3><?php echo $email; ?></h3>

				<br/>
			</div>
		</div>

		<?php
		listCategories($Categories);
		?>

		<div class="container col-md-8">
			<?php
			$posts = $BlogPosts->getAllForUser($id, ITEMS_PER_PAGE, $offset);
			$count = count($posts);
			if ($count > 0) {
				foreach ($posts as $b) {
					$categoryName = $Categories->get($b["category"])["name"];
					$ans = $b["correctAnswerId"] > 0;
					$opened = $b["marked"] == 0;
					if ($opened || $page->isAdmin($Role))
						blogPostWithCategory($b["id"], $b["title"], $id, $firstName, $lastName, $b["date_posted"], $b["category"], $categoryName, $ans, $opened);
				}
				pagination($number, $count, $page);
			} else {
				?>
				<div class="panel panel-default">
					<div class="panel-body text-center">
						<div class="row">
							<p>No Posts.</p>
						</div>
					</div>
				</div>
				<?php
			}
			?>
		</div>

		<?php
	}
    $page->showFooter();
?>