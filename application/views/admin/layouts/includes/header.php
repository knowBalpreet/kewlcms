
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   

    <title>KewlCMS | Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/dashboard.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">KewlCMS</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>" target="_blank">View Site</a></li>
            <li><a href="<?php echo base_url(); ?>admin/authenticate/logout">Logout</a></li>
          </ul>
          <?php $attributes = array('class' =>'navbar-form navbar-right'); ?>
          <?php echo form_open('admin/articles/index',$attributes); ?>
          <?php
          	$data = array(
          			'name' => 'keywords',
          			'class' => 'form-control',
          			'placeholder' => 'Search Articles...'
          		);
          	echo form_input($data);
          ?>
          <?php echo form_close(); ?>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">