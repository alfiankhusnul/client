<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo asset_url()."css/bootstrap.min.css"; ?>">
    <script src="<?php echo asset_url()."js/jquery-3.3.1.min.js"; ?>"></script>
    <script src="<?php echo asset_url()."js/bootstrap.min.js"; ?>"></script>
  </head>
  <body>
    <!--    Awal navigasi bar-->
    <nav class="navbar navbar-default">
      <a class="navbar-brand" href="#">Client</a>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor03">
        <ul class="nav navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()."users"; ?>">Person</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">News</a>
          </li>
        </ul>
      </div>
    </nav>
    <!--      Akhir navigasi bar--> 