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
    addInclude("DAO");
    addInclude("People");
    addInclude("Person");
    addInclude("Session");
    addInclude("SessionPerson");
    addInclude("Categories");
    addInclude("BlogPosts");
    addInclude("Answers");
    addInclude("Users");
    addInclude("Role");
    addInclude("UserAvatar");

    $DB = new Database(DB_HOST, DB_USER, DB_PASS, DB_DB);
    $People = new People($DB);
    $Person = new Person($DB);
    $Session = new Session();
    $SessionPerson = new SessionPerson($DB, $Session);
    $Categories = new Categories($DB);
    $BlogPosts = new BlogPosts($DB);
    $Answers = new Answers($DB);
    $Users = new Users($DB);
    $Role = new Role($DB);

