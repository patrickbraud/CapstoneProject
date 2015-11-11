<?php
    $page = new Page("Home", $SessionPerson);

	$page->getModule("categories");
	$page->getModule("blogPost");
    $page->showHeader();


/*if avatar exists use this*/
?>



<?php
/*else use this*/
?>

<div class="container col-md-12">
		<div class="panel-body text-center">
			<img src="avatar-question-mark.png" alt="" width="80" height="80">
			</div>
	</div>

<form class="form-horizontal" role="form" method="post" action="<?php echo $page->currentURL(); ?>">
			<div class="form-group">
				<div class="col-md-offset-4">
					<div class="col-md-6">
						<button type="upload" class="btn btn-default btn-block">
							<a href="?page=upload">Click here to upload a profile picture</a>
						</button>
					</div>
				</div>
			</div>
		</form>

<?php
    $page->showFooter();
?>