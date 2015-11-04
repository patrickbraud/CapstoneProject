<?php function blogPost($blogPostId, $title, $userFirst, $userLast, $date) { ?>
    <div class="row">
        <h3>
            <div>
                <span class="glyphicon glyphicon-check" style="color:green"></span>
                <a href="?page=question&id=<?php echo $blogPostId; ?>"><?php echo $title; ?></a> <br/>
            </div>
        </h3>
        <p class="lead">by <?php echo $userFirst." ".$userLast; ?></p>

        <p><span class="glyphicon glyphicon-time"></span> <?php echo $date; ?></p>
        <hr>
    </div>

<?php } ?>

<?php function blogPostWithCategory($blogPostId, $title, $userFirst, $userLast, $date, $categoryId, $categoryName) { ?>
    <div class="row">
        <h3>
            <div>
                <span class="glyphicon glyphicon-check" style="color:green"></span>
                <a href="?page=question&id=<?php echo $blogPostId; ?>"><?php echo $title; ?></a> <br/>
            </div>
        </h3>
        <h4>
            <div>
                <a href="?page=category_questions&id=<?php echo $categoryId; ?>"><?php echo $categoryName; ?></a>
            </div>
        </h4>
        <p class="lead">by <?php echo $userFirst." ".$userLast; ?></p>

        <p><span class="glyphicon glyphicon-time"></span> <?php echo $date; ?></p>
        <hr>
    </div>

<?php } ?>
