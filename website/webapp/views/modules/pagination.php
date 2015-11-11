<?php
function pagination($number, $count, Page $page) {
    if($count >= ITEMS_PER_PAGE || !is_null($number)) {
        function changeNumber($number, Page $page) {
            $page->changeQuery("number", $number);
            return $page->getURL()."?".$page->getQueryString();
        }

        ?>
        <ul class="pager">
            <li class="previous">
                <?php if($number-1 > 0) { ?>
                    <a href="<?php echo changeNumber($number-1, $page); ?>">&larr; Newer</a>
                <?php } ?>
            </li>
            <li class="next">
                <?php if($number+1 < $count) { ?>
                    <a href="<?php echo changeNumber($number+1, $page); ?>">Older &rarr;</a>
                <?php } ?>
            </li>
        </ul>
        <?php
    }
}

function calcOffset($number) {
    return ($number * ITEMS_PER_PAGE) - ITEMS_PER_PAGE;
}

?>