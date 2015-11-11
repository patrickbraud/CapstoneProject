<?php
    $page = new Page("Home", $SessionPerson);
	$page->getModule("categories");
	$page->getModule("blogPost");
	$page->getModule("pagination");

	if(isset($_POST["submit"]) && isset($_FILE["avatar"])) {
		$target_dir = ICONS_DIR;
		$target_file = $target_dir . basename($_FILES["avatar"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["avatar"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}
		// Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["avatar"]["size"] > 500000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["avatar"]["name"]). " has been uploaded.";
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}

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