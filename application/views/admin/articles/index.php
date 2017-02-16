<!--Display Messages-->
<?php if ($this->session->flashdata('article_saved')) {
  echo "<p class='alert alert-success'>".$this->session->flashdata('article_saved');
} ?>
<?php if ($this->session->flashdata('article_published')) {
  echo "<p class='alert alert-success'>".$this->session->flashdata('article_published');
} ?>
<?php if ($this->session->flashdata('article_unpublished')) {
  echo "<p class='alert alert-success'>".$this->session->flashdata('article_unpublished');
} ?>
<?php if ($this->session->flashdata('article_deleted')) {
  echo "<p class='alert alert-success'>".$this->session->flashdata('article_deleted');
} ?>


<h1 class="page-header">Articles</h1><a href="<?php echo base_url(); ?>admin/articles/add" class="btn btn-success" style="float: right;">Add Article</a> <div class="table-responsive">
<br><br><br>
  <table class="table table-striped" style="width: 100%">
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