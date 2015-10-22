<?php
	$page = new Page("Edit Users Page", $SessionPerson);
	$page->requireAdmin($Role);
	$page->showHeader();
?>

<form classs="form-horizontal" role="form">
	<div class="form-group">
	</div>

	<div class="form-group">
		<div class="col-md-4">
			
			<div class="container">            
				<table class="table table-bordered">
			    	<thead>
			    		<tr>
			    			<th>Edit User</th>
					        <th>First Name</th>
					        <th>Last Name</th>
					        <th>Email</th>
					        <th>Role</th>
			      		</tr>
			    	</thead>
			    <tbody>
				<?php foreach($Users->getAll() as $u) { ?>
			    	<tr>
			    		<td>Edit, Remove, Change Role</td>
			    		<td><?php echo $u["first_name"]; ?></td>
			    		<td><?php echo $u["last_name"]; ?></td>
			    		<td><?php echo $u["email"]; ?></td>
			    		<td><?php echo $Role->getRoleName($u["role_id"]); ?></td>
			      	</tr>
				<?php } ?>
			    </tbody>
			  </table>
			</div>
		</div>
	</div>
</form>


<?php
	$page->showFooter();
?>