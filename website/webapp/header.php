<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->title; ?></title>
    <meta name="description" content="<?php echo PROJECT_DESC; ?>">
    <meta name="author" content="<?php echo PROJECT_AUTHORS; ?>">
    <!--See: http://getbootstrap.com/getting-started/#download -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


    <!-- Custom CSS -->
    <link href="<?php echo $this->getAsset("css/blog-home.css"); ?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



</head>
<body>

<?php
    include($this->path."nav.php"); //The Navigation
    function newBlogPost($title, $author, $date, $banner, $desc) {
        $output =
            '<h2><div>'.
                '<a href="#"><span class="glyphicon glyphicon-chevron-up"> </span></a>'.
                '<a href="#"> '.$title.'</a>'.
                '<br />'.
                '<a href="#"><span class="glyphicon glyphicon-chevron-down"> </span></a>'.
            '</div></h2>' .
            '<p class="lead">by <a href="index.php">'.$author.'</a></p>' .
            '<p><span class="glyphicon glyphicon-time"></span> Posted on '.$date.'</p>' .
            '<hr>' .
            '<p>'.$desc.'</p>' .
            '<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>' .
            '<hr>';
        return $output;

    }
    function pager() {
        $output = '<!-- Pager -->
            <ul class="pager">
                <li class="previous"><a href="#">&larr; Older</a></li>
                <li class="next"><a href="#">Newer &rarr;</a></li>
            </ul>';
        return $output;
    }
    function pageHeader($title, $secondary = "") {
        $output = '<h1 class="page-header">'.$title.' <small>'.$secondary.'</small></h1>';
        return $output;
    }

    /*function makeList($list = array()) { //array(
        $output = '<div class="list-group">';
          foreach ($i as array_keys($list)) {
              $key =
              $output += '<a href="#" class="list-group-item">'.$title.'</a>';
          }
        return $output + '</div>';

    }*/
?>

<!-- Page Content -->
<div class="container">




