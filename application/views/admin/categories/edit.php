<?php echo validation_errors('<p class="alert alert-dismissable alert-danger">'); ?>
<form method="post" action="<?php echo base_url(); ?>admin/categories/edit/<?php echo $category->id;?>" >
  <div class="row">
    <div class="col-md-6">
      <h1>Add Category</h1>              
    </div>
    <div class="col-md-6">
      <div class="btn-group pull-right">
        <input type="submit" name="submit" id="page_submit" class="btn btn-default" value="Save">
        <a href="<?php echo base_url(); ?>admin/categories" class="btn btn-default">Close</a>
      </div>
    </div>
  </div> 
  <div class="row">
    <div class="col-md-12">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url(); ?>admin/categories"><i class="fa fa-pencil"></i> Categories</a></li>
        <li class="active"><i class="fa fa-plus-square-o"></i> Add Category</li>
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="form-group">
        <label>Category Name</label>
        <input type="text" name="name" value="<?php echo $category->name; ?>" class="form-control">
      </div>
    </div>
  </div>
</form>