<?php function listCategories(Categories $categories, $roleId = 0) { ?>
<div class = "container col-md-offset-1 col-md-3 pull-right">
    <div class="well well-lg">
        <?php
            $id = 0;
            if(!is_null($roleId)) $id = $roleId;
            foreach($categories->getAllForViewRole($id) as $c) {
                echo '<a href="?page=category_questions&id='.$c['id'].'">'.$c['name'].'</a><br />';
            }
        ?>
    </div>
</div>
<?php } ?>
