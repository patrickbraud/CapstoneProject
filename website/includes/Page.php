<?php
/**
 * Created by IntelliJ IDEA.
 * User: james
 * Date: 9/17/15
 * Time: 11:20 AM
 */


class Page {
    private $title = "";
    private $path = "";
    function __construct($title = "", $path = "") {
        $this->title = $title;
        $this->path = $path;
    }
    function showHeader() {
        include($this->path."webapp/header.php");
    }
    function showFooter() {
        include($this->path."webapp/footer.php");
    }
}