<h1 class="page-header">Users</h1><a href="<?php echo base_url(); ?>admin/users/add" class="btn btn-success" style="float: right;">Add User</a> 
<br><br>
<div class="table-responsive">
	<table class="table table-striped" style="width: 100%">
        <thead>
          <th width="70">#</th>
          <th>Name</th>
          <th>UserName</th>
          <th>Email</th>
          <th>Actions</th>
        </thead>
        <tbody>
        <?php foreach ($users as $user) { ?>
          <tr>
            <td><?php echo $user->id; ?></td>
            <td><?php echo $user->first_name." ".$user->last_name ; ?></td>
            <td><?php echo $user->username; ?></td>
            <td><?php echo $user->email; ?></td>
            <td>
              <a href="<?php echo base_url(); ?>admin/users/edit/<?php echo $user->id; ?>" class="btn btn-primary">Edit</a>
              <a href="<?php echo base_url(); ?>admin/users/delete/<?php echo $user->id; ?>" class="btn btn-danger">Delete</a>
            </td>
          </tr>
        <?php } ?>
        </tbody>
  </table>
</div>