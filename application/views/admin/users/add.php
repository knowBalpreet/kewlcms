<?php echo validation_errors('<p class="alert alert-dismissable alert-danger">'); ?>
<form method="post" action="<?php echo base_url(); ?>admin/users/add" >
  <div class="row">
    <div class="col-md-6">
      <h1>Add User</h1>              
    </div>
    <div class="col-md-6">
      <div class="btn-group pull-right">
        <input type="submit" name="submit" id="page_submit" class="btn btn-default" value="Save">
        <a href="<?php echo base_url(); ?>admin/users" class="btn btn-default">Close</a>
      </div>
    </div>
  </div> 
  <div class="row">
    <div class="col-md-12">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url(); ?>admin/users"><i class="fa fa-pencil"></i> Users</a></li>
        <li class="active"><i class="fa fa-plus-square-o"></i> Add User</li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="form-group">
        <label>First Name</label>
        <input type="text" name="first_name" value="<?php echo set_value('first_name'); ?>" class="form-control">
      </div>
      <div class="form-group">
        <label>Last Name</label>
        <input type="text" name="last_name" value="<?php echo set_value('last_name'); ?>" class="form-control">
      </div>
      <div class="form-group">
        <label>E-mail Address</label>
        <input type="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control">
      </div>
      <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" value="<?php echo set_value('username'); ?>" class="form-control">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" value="<?php echo set_value('password'); ?>" class="form-control">
      </div>
      <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" name="confirm_password" value="<?php echo set_value('confirm_password'); ?>" class="form-control">
      </div>
      <div class="form-group">
        <label>User Group</label>
        <select name="group" class="form-control">
        <?php foreach ($groups as $group) {?>
          <option value="<?php echo $group->id; ?>"><?php echo $group->name; ?></option>
        <?php } ?>
      </select>
      </div>
      </div>
    </div>
  </div>
</form>