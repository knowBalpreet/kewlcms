<!--Display Messages-->
<?php if ($this->session->flashdata('category_saved')) {
  echo "<p class='alert alert-success'>".$this->session->flashdata('category_saved');
} ?>
<?php if ($this->session->flashdata('category_deleted')) {
  echo "<p class='alert alert-success'>".$this->session->flashdata('category_deleted');
} ?>
<h1 class="page-header">Categories</h1><a href="<?php echo base_url(); ?>admin/categories/add" class="btn btn-success" style="float: right;">Add Category</a> 
        <br><br>
<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <th width="70">#</th>
      <th>Name</th>
      <th>Actions</th>
    </thead>
    <tbody>
    <?php foreach ($categories as $category) { ?>
      <tr>
        <td><?php echo  $category->id ?></td>
        <td><?php echo  $category->name ?></td>
        <td>
          <a href="<?php echo base_url(); ?>admin/categories/edit/<?php echo $category->id;?>" class="btn btn-primary">Edit</a>
          <a href="<?php echo base_url(); ?>admin/categories/delete/<?php echo $category->id;?>" class="btn btn-danger">Delete</a>
        </td>
      </tr>
      
    <?php } ?>
    </tbody>
  </table>
</div>