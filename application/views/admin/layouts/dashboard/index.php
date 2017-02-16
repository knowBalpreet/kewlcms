<h1 class="page-header">Dashboard</h1>
<h2 class="sub-header">Articles</h2>
<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th width="70">#</th>
        <th>Name</th>
        <th>Category</th>
        <th>Author</th>
        <th>Date</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($articles as $article) { ?>
      <tr>
        <td><?php echo $article->id; ?></td>
        <td><?php echo $article->title; ?></td>
        <td><?php echo $article->category_name; ?></td>
        <td><?php echo $article->first_name." ".$article->last_name; ?></td>
        <td><?php echo date("F j,Y g:i a",strtotime($article->created)) ; ?></td>
        <td>
          <a href="<?php echo base_url(); ?>admin/articles/edit/<?php echo $article->id;?>" class="btn btn-primary">Edit</a>
          <?php if ($article->is_published == 0) {?>
          <a href="<?php echo base_url(); ?>admin/articles/publish/<?php echo $article->id;?>" class="btn btn-success">Publish</a>
            
          <?php }elseif ($article->is_published == 1){ ?>
          <a href="<?php echo base_url(); ?>admin/articles/unpublish/<?php echo $article->id;?>" class="btn btn-warning">Unpublish</a>

          <?php  } ?>
          <a href="<?php echo base_url(); ?>admin/articles/delete/<?php echo $article->id;?>" class="btn btn-danger">Delete</a> 
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>
<div class="row">
  <div class="col-md-6">
    <h3>Latest Categories</h3>
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
  </div>
  <div class="col-md-6">
    <h3>Latest Users</h3>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <th width="70">#</th>
          <th>UserName</th>
          <th>Actions</th>
        </thead>
        <tbody>
        <?php foreach ($users as $user) { ?>
          <tr>
            <td><?php echo $user->id; ?></td>
            <td><?php echo $user->first_name." ".$user->last_name ; ?></td>
            <td>
              <a href="<?php echo base_url(); ?>admin/users/edit/<?php echo $user->id;?>" class="btn btn-primary">Edit</a>
              <a href="<?php echo base_url(); ?>admin/users/delete/<?php echo $user->id;?>" class="btn btn-danger">Delete</a>
            </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
  </div>
</div>
