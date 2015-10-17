<?php
    $page = new Page();

    if($page->getQuery("id") != NULL) {
        $post = $BlogPosts->get($page->getQuery("id"));
        $user = $Users->get($post["user_id"]);
        $page->setTitle($post["title"]);
        $page->showHeader();
?>
    <div class = "container col-md-12">
        <h3><?php echo $post["title"]; ?></h3>
	    <div class="panel panel-primary">
  	        <div class="panel-heading">
    	        <div class="row">
  		        <div class="col-sm-6"><?php echo $user["first_name"]." ".$user["last_name"]; ?></div>
  		        <div class="col-sm-6 text-right"><?php echo $post["date_posted"]; ?></div>
	        </div>
  	        </div>
  	    <div class="panel-body"><?php echo $post['post']; ?></div>
	</div>
	</div>
    </div>
    <?php
        if(true) {
            foreach($Answers->getAllForBlogPost($page->getQuery("id")) as $a) {
                $userA = $Users->get($a["user_id"]);
    ?>
                <div class="panel panel-info">
                    <div class="panel-heading">
                    <div class="row">
                        <div class="col-sm-6"><?php echo $userA["first_name"]." ".$userA["last_name"]; ?></div>
                        <div class="col-sm-6 text-right"><?php echo $a["date_posted"]; ?></div>
                    </div>
                </div>
                <div class="panel-body"><?php echo $a["post"]; ?></div>
                </div>
    <?php
            }
        }
    ?>
    <div class="form-group">
      <label for="comment">Answer Question:</label>
      <textarea class="form-control" rows="5" id="comment"></textarea>
    </div>

    <div class="btn-group" role="group" aria-label="...">
      <button type="button" class="btn btn-default">Submit</button>
    </div>
<?php
        $page->showFooter();
    } else {
        echo "error";
    }
?>

