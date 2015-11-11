<?php
    $page = new Page("Home", $SessionPerson);

	$page->getModule("categories");
	$page->getModule("blogPost");
    $page->showHeader();
?>

    
  	<div class="container col-md-8">
		<div class="panel-body text-center">
			<!-- <h2><?php echo $page->getTitle(); ?></h2> -->
			<img src="Tech_Logo.png" alt="" width="80" height="80">
			<h2>James Little</h2>
			<h2>james.little@ttu.edu | 1010</h2>
		</div>
	</div>

	
<?php
    listCategories($Categories);
?>
<div class="container col-md-8">
	<div class="row">
	    <h3>
	       	<div>
	            Post Title
	            <?php if(true)
	                	echo '<span class="glyphicon glyphicon-ok" style="color:green"></span>';
	                if(true)
	                  	echo '<span class="glyphicon glyphicon-remove" style="color:red"></span>';
	            ?>
	            <br/>
	        </div>
	    </h3>
	    <p><span class="glyphicon glyphicon-time"></span> date</p>
	    <hr>
	</div>

	<div class="row">
	    <h3>
	       	<div>
	            Post Title
	            <?php if($answered)
	                	echo '<span class="glyphicon glyphicon-ok" style="color:green"></span>';
	                if(true)
	                  	echo '<span class="glyphicon glyphicon-remove" style="color:red"></span>';
	            ?>
	            <br/>
	        </div>
	    </h3>
	    <p><span class="glyphicon glyphicon-time"></span> date</p>
	    <hr>
	</div>

	<div class="row">
	    <h3>
	       	<div>
	            Post Title
	            <?php if($answered)
	                	echo '<span class="glyphicon glyphicon-ok" style="color:green"></span>';
	                if(true)
	                  	echo '<span class="glyphicon glyphicon-remove" style="color:red"></span>';
	            ?>
	            <br/>
	        </div>
	    </h3>
	    <p><span class="glyphicon glyphicon-time"></span> date</p>
	    <hr>
	</div>
</div>





<?php
    $page->showFooter();
?>