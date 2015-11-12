<?php
	$page = new Page("Contacts", $SessionPerson);
	$page->showHeader();
    $page->getModule("categories");

?>

<div class="container col-md-8">
  <h1>
  	<p>Administrator Contacts</p>
  </h1>
    <div class="panel-group">
      <div class="panel panel-default">
        <div class="panel-body">James Little</div>
        <div class="panel-footer">Email : james.little@ttu.edu</div>
      </div>
    </div>

    <div class="panel-group">
      <div class="panel panel-default">
        <div class="panel-body">Patrick Braud</div>
        <div class="panel-footer">Email : patrick.braud@ttu.edu</div>
      </div>
    </div>

  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-body">Randall Harper</div>
      <div class="panel-footer">Email : randall.harper@ttu.edu</div>
    </div>
  </div>

  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-body">Jason Weber</div>
      <div class="panel-footer">Email : jason.weber@ttu.edu</div>
    </div>
  </div>
</div>

<br/>
<br/>
<br/>
<?php listCategories($Categories, $SessionPerson->role()); ?>

<?php
	$page->showFooter();
?>