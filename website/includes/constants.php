<?php
/* METADATA */
define("PROJECT_NAME", "CS Web Blog");
define("PROJECT_DESC", "Something something, give us an A.");
define("PROJECT_AUTHORS", "James Little, Jason Webb, Patrick Braud, and Randall Harper.");
define("PAGE_FOOTER", "Copyright &copy; ".PROJECT_NAME." 2015");
define("ITEMS_PER_PAGE", 10);

define("ICONS_DIR", "user_icons/");

/* POINTS */
define("STARTING_POINTS", 100);
define("QUESTION_POINTS", 10);
define("AWARD_POINTS", 20);

/* DATABASE */
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "root");
define("DB_DB", "ttu cs blog");
define("SALT", "jameslittleisthebestintheworld");

/* PAGES */
define("LOGIN_PAGE", "login");
define("LANDING_PAGE", "home"); //The page after they login.
define("HOME_PAGE", "login");
define("UNAUTH_PAGE", "notfound");

/* TABLE NAMES */
define("TBL_PEOPLE", "users");
define("TBL_CATEGORIES", "categories");
define("TBL_BLOG_POSTS", "blog_posts");
define("TBL_ANSWERS", "answers");
define("TBL_ROLES", "roles");

/* ROLES */
define("GUEST_ROLE", -1);
define("USER_ROLE", 0);
define("STAFF_ROLE", 1);
define("ADMIN_ROLE", 2);

