<?php
    /* Generic Include Functions */
    function add($folder, $file) {
        include($folder."/".$file.".php");
    }
    function addInclude($includeFile) {
        add("includes", $includeFile);
    }



    /* Actual Includes */
    addInclude("constants");
    addInclude("Page");
