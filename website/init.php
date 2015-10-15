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
    addInclude("Database");
    addInclude("People");
    addInclude("Person");
    addInclude("Session");
    addInclude("SessionPerson");

    $DB = new Database(DB_HOST, DB_USER, DB_PASS, DB_DB);
    //$People = new People($DB);
    $Person = new Person($DB);
    $Session = new Session();

