<?php
    $page = new Page("", $SessionPerson);

    if($page->getQuery("id") != NULL) {
        $id = $page->getQuery("id");
        $post = $BlogPosts->get($id);
        $hasAnswer = $BlogPosts->hasAnswer($id);
        $user = $Users->get($post["user_id"]);
        if(!is_null($page->getQuery("mark"))) {
            $markId = $page->getQuery("mark");
            $correctUser = $Answers->get($markId)["user_id"];
            $People->addPoint($correctUser, AWARD_POINTS);
            $BlogPosts->markAnswer($id, $markId);
            $page->removeQuery("mark");
            $page->redirect();
            exit;
        }
        if(isset($_POST["submit"])) {
            $answer = $_POST["answer"];
            $now = date("o-m-d");
            $Answers->add($SessionPerson->id(), $id, $answer, $now);
            $page->redirect();
        } else {
            $page->setTitle($post["title"]);
            $page->showHeader();
    ?>
        <div class = "container col-md-12">
            <h3><?php echo $post["title"]; ?></h3>
            <?php if($page->isAdmin($Role)) { ?>
                <a href="#">Move Post</a> or <a href="#">Close Post</a>
            <?php } ?>

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
            if(true) { //is this fine?? do we need to count answers here??
                foreach($Answers->getAllForBlogPost($page->getQuery("id")) as $a) {
                    $userA = $Users->get($a["user_id"]);
        ?>
                    <div class="panel
                    <?php
                        if($hasAnswer && $a["id"] == $post["correctAnswerId"]) echo "panel-success";
                        else echo "panel-info";
                    ?>">
                        <div class="panel-heading">
                        <div class="row">
                            <div class="col-sm-6">
                                <?php echo $userA["first_name"]." ".$userA["last_name"]; ?>
                                <?php if($BlogPosts->isPoster($id, $SessionPerson->id()) && !$hasAnswer) { ?>
                                    [<a href="<?php echo $page->currentURL()."&mark=".$a["id"]; ?>">Mark as Answer</a>]
                                <?php } ?>
                            </div>
                            <div class="col-sm-6 text-right"><?php echo $a["date_posted"]; ?></div>
                        </div>
                    </div>
                    <div class="panel-body"><?php echo $a["post"]; ?></div>
                    </div>
        <?php
                }
            }
            if(!$hasAnswer && $SessionPerson->isAuth()) {
        ?>
            <form action="<?php echo $page->currentURL(); ?>" method="post">

                <div class="form-group">
                  <label for="comment">Answer Question:</label>
                  <textarea class="form-control" rows="5" id="answer" name="answer"></textarea>
                </div>

                <div class="btn-group" role="group" aria-label="...">
                  <input type="submit" class="btn btn-default" id="submit" name="submit" value="Submit" />
                </div>
            </form>
    <?php
            }
        }
        $page->showFooter();
    } else {
        echo "error";
    }
?>