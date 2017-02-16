<!--Display Messages-->
<?php if ($this->session->flashdata('group_saved')) {
  echo "<p class='alert alert-success'>".$this->session->flashdata('group_saved');
} ?>
<?php if ($this->session->flashdata('group_deleted')) {
  echo "<p class='alert alert-success'>".$this->session->flashdata('group_deleted');
} ?>
<h1 class="page-header">Groups</h1><a href="<?php echo base_url(); ?>admin/groups/add" class="btn btn-success" style="float: right;">Add Group</a> 
        <br><br>
<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <th width="70">#</th>
      <th>Name</th>
      <th>Actions</th>
    </thead>
    <tbody>
    <?php foreach ($groups as $group) { ?>
      <tr>
        <td><?php echo  $group->id ?></td>
        <td><?php echo  $group->name ?></td>
        <td>
          <a href="<?php echo base_url(); ?>admin/groups/edit/<?php echo $group->id;?>" class="btn btn-primary">Edit</a>
          <a href="<?php echo base_url(); ?>admin/groups/delete/<?php echo $group->id;?>" class="btn btn-danger">Delete</a>
        </td>
      </tr>
      
    <?php } ?>
    </tbody>
  </table>
</div>