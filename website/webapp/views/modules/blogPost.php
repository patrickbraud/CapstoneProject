<?php function blogPost($blogPostId, $title, $userId, $userFirst, $userLast, $date, $answered = false, $isOpen = true) { ?>
    <div class="row">
        <h4>
            <div>
                <a href="?page=question&id=<?php echo $blogPostId; ?>"><?php echo $title; ?></a>
                <?php if($answered)
                    echo '<span class="glyphicon glyphicon-ok" style="color:green"></span>';
                 if(!$isOpen)
                  echo '<span class="glyphicon glyphicon-remove" style="color:red"></span>';
                ?>
                <br/>
            </div>
        </h4>
        <?php $ua = new UserAvatar($userId); ?>
        <p>by <a href="?page=profile&id=<?php echo $userId; ?>"><?php echo $userFirst." ".$userLast." ".$ua->getImage(15, 15); ?></a></p>

        <p><span class="glyphicon glyphicon-time"></span> <?php echo $date; ?></p>
        <hr>
    </div>

<?php } ?>

<?php function blogPostWithCategory($blogPostId, $title, $userId, $userFirst, $userLast, $date, $categoryId, $categoryName, $answered = false, $isOpen = true) { ?>
    <div class="row">
        <h4>
            <div>
                <a href="?page=question&id=<?php echo $blogPostId; ?>"><?php echo $title; ?></a>
                <?php if($answered)
                    echo '<span class="glyphicon glyphicon-ok" style="color:green"></span>';
               if(!$isOpen)
                   echo '<span class="glyphicon glyphicon-remove" style="color:red"></span>';
               ?>
                 <br/>
            </div>
        </h4>
        <h5>
            <a href="?page=category_questions&id=<?php echo $categoryId; ?>"><?php echo $categoryName; ?></a>
        </h5>
        <?php $ua = new UserAvatar($userId); ?>
        <p>by <a href="?page=profile&id=<?php echo $userId; ?>"><?php echo $userFirst." ".$userLast." ".$ua->getImage(15, 15); ?></a></p>

        <p><span class="glyphicon glyphicon-time"></span> <?php echo $date; ?></p>
        <hr>
    </div>

<?php } ?>
