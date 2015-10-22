<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?php echo PROJECT_NAME; ?></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
				<li>
                    <a href="?page=home">Home</a>
                </li>
                <li>
                    <a href="?page=contacts">Contact</a>
                </li>
                <!-- ONLY show this button if logged in
                <li>
                    <a href="#">My Account</a>
                </li>
                 -->
				<li>

					<form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-default">Go!</button>
					</form>
				</li>
				<ul class="nav navbar-nav">
                    <?php if($this->isAuth()) { //If logged in ?>
                            <li><a href="#">Welcome <?php echo $this->person->fullName(); ?> (<?php echo $this->person->points(); ?>)</a></li>
                            <li><a href="?page=logout">Logout</a></li>
                   <?php  } else { // not Logged in ?>
                        <li><a href="?page=login">Sign In</a></li>
                        <li><a href="?page=register">Register</a></li>
                   <?php } ?>
				</ul>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>