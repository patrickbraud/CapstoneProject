<?php function listCategories(Categories $categories) { ?>
<div class = "container col-md-offset-2 col-md-3 pull-right">
    <div class="well well-lg">
        <?php
            foreach($categories->getAll() as $c) {
                echo '<a href="?page=category_questions&id='.$c['id'].'">'.$c['name'].'</a><br />';
            }
        ?>
    </div>
</div>
<?php } ?>
