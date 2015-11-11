<?php
    $page = new Page("Home", $SessionPerson);

	$page->getModule("categories");
	$page->getModule("blogPost");
    $page->showHeader();
?>

    
  	<div class="container col-md-8">
		<div class="panel-body text-center">
			<img src="Tech_Logo.png" alt="" width="80" height="80">
<<<<<<< Updated upstream
			<h2>James Little</h2>
			<h2>james.little@ttu.edu | 1010</h2>
=======
			<h2>Patrick Braud | 1200</h2>
			<h3>patrick.braud@ttu.edu</h3>
>>>>>>> Stashed changes
		</div>
	</div>

	
<?php
    listCategories($Categories);
?>
<div class="container col-md-8">
	<div class="row">
	    <h3>
	       	<div>
<<<<<<< Updated upstream
	            Post Title
	            <?php if(true)
=======
	            <a href="#">Post Title</a>
	            <?php if($answered)
>>>>>>> Stashed changes
	                	echo '<span class="glyphicon glyphicon-ok" style="color:green"></span>';
	                if(true)
	                  	echo '<span class="glyphicon glyphicon-remove" style="color:red"></span>';
	            ?>
	            <br/>
	        </div>
	    </h3>
	     <h4>
            <div>
                <a href="#">Category Name</a>
            </div>
        </h4>
	    <p><span class="glyphicon glyphicon-time"></span> date</p>
	    <hr>
	</div>

	<div class="row">
	    <h3>
	       	<div>
	            <a href="#">Post Title</a>
	            <?php if($answered)
	                	echo '<span class="glyphicon glyphicon-ok" style="color:green"></span>';
	                if(true)
	                  	echo '<span class="glyphicon glyphicon-remove" style="color:red"></span>';
	            ?>
	            <br/>
	        </div>
	    </h3>
	    <h4>
            <div>
                <a href="#">Category Name</a>
            </div>
        </h4>
	    <p><span class="glyphicon glyphicon-time"></span> date</p>
	    <hr>
	</div>

	<div class="row">
	    <h3>
	       	<div>
	            <a href="#">Post Title</a>
	            <?php if($answered)
	                	echo '<span class="glyphicon glyphicon-ok" style="color:green"></span>';
	                if(true)
	                  	echo '<span class="glyphicon glyphicon-remove" style="color:red"></span>';
	            ?>
	            <br/>
	        </div>
	    </h3>
	    <h4>
            <div>
                <a href="#">Category Name</a>
            </div>
        </h4>
	    <p><span class="glyphicon glyphicon-time"></span> date</p>
	    <hr>
	</div>
</div>





<?php
    $page->showFooter();
?>