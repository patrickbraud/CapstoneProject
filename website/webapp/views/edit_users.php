<?php
	$page = new Page("Edit Users Page", $SessionPerson);
	$page->requireLogin();
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
					        <th>Firstname</th>
					        <th>Lastname</th>
					        <th>Email</th>
					        <th>Role</th>
			      		</tr>
			    	</thead>
			    <tbody>
			    	<tr>
			    		<td><button type="edit_user" class="btn btn-link" >Edit</button></td>
			    		<td>Randall :O</td>
			    		<td>Harper :O</td>
			    		<td>randall.harper@ttu.edu :O</td>
			    		<td>user :O</td>
			      	<tr>
			      		<td><button type="edit_user" class="btn btn-link" >Edit</button></td>
				        <td>John</td>
				        <td>Doe</td>
				        <td>john@example.com</td>
				        <td>user</td>
			      	</tr>
			      	<tr>
			      		<td><button type="edit_user" class="btn btn-link" >Edit</button></td>
				        <td>Mary</td>
				        <td>Moe</td>
				        <td>mary@example.com</td>
				        <td>user</td>
			      	</tr>
			      	<tr>
			      		<td><button type="edit_user" class="btn btn-link" >Edit</button></td>
				        <td>July</td>
				        <td>Dooley</td>
				        <td>july@example.com</td>
				        <td>user</td>
			    	</tr>
			    </tbody>
			  </table>
			</div>
		</div>
	</div>
</form>


<?php
	$page->showFooter();
?>