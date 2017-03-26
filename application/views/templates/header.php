<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title><?php echo $title; ?></title>
	
		<!-- jQuery CDN test, kui CDN pole saadaval, kasutab lokaalset faili -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>media/js/jquery.min.js"><\/script>')</script>
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/css/style.css">
    <script type='text/javascript' src="<?php echo base_url(); ?>media/js/bootstrap.min.js"></script>

</head>
<body>