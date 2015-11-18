<?php
    $page = new Page("", $SessionPerson);
    $page->getModule("categories");

    if($page->getQuery("id") != NULL) {
        $id = $page->getQuery("id");


        if($page->getQuery("movePost")) {

            if(isset($_POST["submit"])) {
                $BlogPosts->movePost($id, $_POST["move_to"]);
                $page->removeQuery("movePost");
                $page->changeQuery("id", $_POST["move_to"]);
                $page->changeQuery("page", "category_questions");
                $page->redirect();
            }
            $page->showHeader();
            ?>
            <form class="form-horizontal" role="form" method="post" action="<?php echo $page->currentURL(); ?>">

                <div class="form-group">
                    <label class="control-label col-md-offset-2 col-md-2" for="move_to">Category</label>

                    <div class="col-md-4">

                        <select id="move_to" name="move_to">
                            <?php foreach($Categories->getAll() as $c) { ?>
                                <option value="<?php echo $c["id"]; ?>"><?php echo $c["name"]; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
					<div class="col-md-offset-4">
						<div class="col-md-6">
							<input type="submit" class="btn btn-default btn-block" id="submit" name="submit" value="Move"/>
						</div>
					</div>
				</div>


            </form>
            <?php
            $page->showFooter();



        } else {
            $post = $BlogPosts->get($id);
            $hasAnswer = $BlogPosts->hasAnswer($id);
            $user = $Users->get($post["user_id"]);
            if (!is_null($page->getQuery("mark"))) {
                $markId = $page->getQuery("mark");
                $correctUser = $Answers->get($markId)["user_id"];
                $People->addPoint($correctUser, AWARD_POINTS);
                $BlogPosts->markAnswer($id, $markId);
                $page->removeQuery("mark");
                $page->redirect();
                exit;
            }
            if (isset($_POST["submit"])) {
                $answer = $_POST["answer"];
                $now = date("o-m-d");
                $Answers->add($SessionPerson->id(), $id, $answer, $now);
                $page->redirect();
            } else {
                $page->setTitle($post["title"]);
                $page->showHeader();

                ?>
                <div class="container col-md-12">
                    <div class="panel-body text-center">
                        <h3><?php echo $post["title"]; ?></h3>
                        <br/>
                    </div>
                </div>


                <?php listCategories($Categories, $SessionPerson->role()); ?>
                <div class="container col-md-8">
                    <?php if ($page->isAdmin($Role)) {
                        if ($post["marked"] == 0) { ?>
                            [
                            <a href="?page=postFunctions&prefix=admin&func=closePost&postId=<?php echo $id; ?>&ref=question">Close
                                Post</a>]
                        <?php } else { ?>
                            [
                            <a href="?page=postFunctions&prefix=admin&func=openPost&postId=<?php echo $id; ?>&ref=question">Open
                                Post</a>]
                        <?php } ?>

                        [<a href="?page=question&id=<?php echo $id; ?>&movePost=1">Move Post</a>]

                    <?php } ?>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-sm-6">
                                    <?php
                                    $ua = new UserAvatar($user["id"]);
                                    echo $ua->getImage(30, 30) . " "; ?>
                                    <a href="?page=profile&id=<?php echo $user["id"]; ?>"
                                       style="color: rgb(255,255,255)">
                                        <?php echo $user["first_name"] . " " . $user["last_name"]; ?>
                                    </a>
                                </div>
                                <div class="col-sm-6 text-right"><?php echo $post["date_posted"]; ?></div>
                            </div>
                        </div>
                        <div class="panel-body"><?php echo $post['post']; ?></div>
                    </div>
                </div>
                <?php
                if (true) { //is this fine?? do we need to count answers here??
                    foreach ($Answers->getAllForBlogPost($page->getQuery("id")) as $a) {
                        $userA = $Users->get($a["user_id"]);
                        ?>
                        <div class="container col-md-8">
                            <div class="panel
                    <?php
                            if ($hasAnswer && $a["id"] == $post["correctAnswerId"]) echo "panel-success";
                            else echo "panel-info";
                            ?>">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <?php $ua = new UserAvatar($a["user_id"]);
                                            echo $ua->getImage(30, 30); ?>
                                            <a href="?page=profile&id=<?php echo $userA["id"]; ?>"><?php echo $userA["first_name"] . " " . $userA["last_name"]; ?></a>
                                            <?php if ($BlogPosts->isPoster($id, $SessionPerson->id()) && !$hasAnswer) { ?>
                                                [<a href="<?php echo $page->currentURL() . "&mark=" . $a["id"]; ?>">Mark
                                                    as Answer</a>]
                                            <?php } ?>
                                        </div>
                                        <div class="col-sm-6 text-right"><?php echo $a["date_posted"]; ?></div>
                                    </div>
                                </div>
                                <div class="panel-body"><?php echo $a["post"]; ?></div>
                            </div>
                        </div>
                        <?php
                    }
                }
                if (!$hasAnswer && $SessionPerson->isAuth() && $Categories->allowedToComment($post["category"], $SessionPerson->role())) {
                    ?>
                    <form action="<?php echo $page->currentURL(); ?>" method="post" class="col-md-8">

                        <div class="form-group">
                            <label for="comment">Answer Question:</label>
                            <textarea class="form-control" rows="5" id="answer" name="answer"></textarea>
                        </div>

                        <div class="btn-group" role="group" aria-label="...">
                            <input type="submit" class="btn btn-default" id="submit" name="submit" value="Submit"/>
                        </div>
                    </form>
                    <?php
                }
            }
            $page->showFooter();
        }
    } else {
        echo "error";
    }

?>