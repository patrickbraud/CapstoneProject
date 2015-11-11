<?php
    $page = new Page("Home", $SessionPerson);

	$page->getModule("categories");
	$page->getModule("blogPost");
    $page->showHeader();

    if($page->isAdmin($Role)) {
       echo "<a href=".$page->link("home", "admin").">Admin Panel</a>";
    }

?>

    
  	<div class="container col-md-8">
		<div class="panel-body text-center">
			<!-- <h2><?php echo $page->getTitle(); ?></h2> -->
			<img src="Tech_Logo.png" alt="" width="80" height="80">
			<h2>Name Here</h2>
			<h3>Email Here</h3>
		</div>
	</div>

	
<?php
    listCategories($Categories);
?>

<div class="row">
    <h3>
       	<div>
            Post Title
            <?php if($answered)
                	echo '<span class="glyphicon glyphicon-ok" style="color:green"></span>';
                if(!$isOpen)
                  	echo '<span class="glyphicon glyphicon-remove" style="color:red"></span>';
            ?>
            <br/>
        </div>
    </h3>
   	<p class="lead">by First Last</p>
    <p><span class="glyphicon glyphicon-time"></span> date</p>
    <hr>
</div>

<div class="row">
    <h3>
       	<div>
            Post Title
            <?php if($answered)
                	echo '<span class="glyphicon glyphicon-ok" style="color:green"></span>';
                if(!$isOpen)
                  	echo '<span class="glyphicon glyphicon-remove" style="color:red"></span>';
            ?>
            <br/>
        </div>
    </h3>
   	<p class="lead">by First Last</p>
    <p><span class="glyphicon glyphicon-time"></span> date</p>
    <hr>
</div>





<?php
    $page->showFooter();
?>