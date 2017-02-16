<?php echo validation_errors('<p class="alert alert-dismissable alert-danger">'); ?>
<form method="post" action="<?php echo base_url(); ?>admin/articles/edit/<?php echo $article->id; ?>" >
	<div class="row">
	<div class="col-md-6">
	  <h1>Add Article</h1>              
	</div>
	<div class="col-md-6">
	  <div class="btn-group pull-right">
	    <input type="submit" name="submit" id="page_submit" class="btn btn-default" value="Save">
	    <a href="<?php echo base_url(); ?>admin/articles" class="btn btn-default">Close</a>
	  </div>
	</div>
	</div> 
	<div class="row">
	<div class="col-md-12">
	  <ol class="breadcrumb">
	    <li><a href="<?php echo base_url();  ?>admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	    <li><a href="<?php echo base_url();  ?>admin/articles"><i class="fa fa-pencil"></i> Articles</a></li>
	    <li class="active"><i class="fa fa-plus-square-o"></i> Add Article</li>
	  </ol>
	</div>
	</div>
	<div class="row">
	<div class="col-lg-12">
	  <div class="form-group">
	    <label>Article Title</label>
	    <input type="text" name="title" class="form-control" value="<?php echo $article->title; ?>">
	  </div>
	  <div class="form-group">
 			<label>Category</label>
	    <select name="category" class="form-control">
	      <option value="0">Select category</option>
	      <?php foreach ($categories as $category) {
	      	if ($category->id == $article->category_id) {
	      		$select = 'selected' ;}else{ $select = ''; } ?>
	      	<option value="<?php echo $category->id; ?>" <?php echo $select; ?>><?php echo $category->name; ?></option>
	      <?php } ?>
	    </select>	  </div>
	  <div class="form-group">
	    <label>Article Body</label>
	    <textarea class="form-control" rows="10" name="body"><?php echo $article->body; ?></textarea>
	  </div>
	  <div class="form-group">
	    <label>Access</label>
	    <select name="access" class="form-control">
	      <option value="0">Everyone</option>
	      <?php foreach ($groups as $group) {
	      	if ($group->id == $article->access) {
	      		$select = 'selected' ;}else{ $select = ''; } ?>?>
	      	<option value="<?php echo $group->id; ?>" <?php echo $select; ?> ><?php echo $group->name; ?></option>
	      <?php } ?>
	    </select>
	    <p class="help-block">Choose who will be able to access the article</p>
	  </div>
	  <div class="form-group">
	    <label>Author</label>
	    <select name="user" class="form-control">
	      <option value="0">Select Author</option>
	      <?php foreach ($users as $user) {
	      	if ($user->id == $article->user_id) {
	      		$select = 'selected' ;}else{ $select = ''; } ?>?>
	      	<option value="<?php echo $user->id; ?>" <?php echo $select;?> ><?php echo $user->first_name; ?></option>
	      <?php } ?>
	    </select>
	  </div>
	  <div class="form-group">
	    <label>Published</label>
	    <label for="is_published" class="radio-inline"><input type="radio" name="is_published" value="1" <?php if ($article->is_published == 1) { echo "checked"; }else{echo "";} ?>>Yes</label>
	    <label class="radio-inline"><input type="radio" name="is_published" value="0" <?php if ($article->is_published == 0) { echo "checked"; }else{echo "";} ?>>No</label>

	  </div>
	  <div class="form-group">
	  	<label>Add to Menu</label><br>
	  	<label for="in_menu" class="radio-inline"><input type="radio" name="in_menu" value="1" <?php if ($article->in_menu == 1) { echo "checked"; }else{echo "";} ?>> Yes</label>
	  	<label class="radio-inline">
	  		<input type="radio" name="in_menu" value="0" <?php if ($article->in_menu == 0) { echo "checked"; }else{echo "";} ?>> No
	  	</label>
	  </div>
	  <div class="form-group">
	  	<label>Order</label>
	  	<input type="text" name="order" value="0" value="<?php echo $article->order; ?>" class="form-control" style="width: 40px;">
	  </div>
	</div>
	</div>
</form>
