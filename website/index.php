<?php

include("init.php");
$p = new Page();
$prefix = "";
if(isset($_GET['page']))
    $pg = $_GET['page'];
if(!isset($pg) || $pg == "header" || $pg == "footer" || empty($pg))
    $pg = "home";

if(isset($_GET['prefix']))
    $prefix = $_GET['prefix'];

$file = "webapp/views/".$prefix."/".$pg.".php";

if(file_exists($file)) {
    include($file);
} else
    include("webapp/views/errors/error404.php");