<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array(
			'bootstrap.min',
			'bootstrap-theme.min',
			'style'
		));

		echo $this->Html->script(array(
			'jquery-1.11.1.min',
			'jquery.validate',
			'bootstrap.min',
			'http://maps.google.com/maps/api/js?sensor=false',
			'init'
		));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?php echo $title_for_layout; ?></h1>
			</div>
		</div>
		
		<?php echo $this->Session->flash(); ?>

		<?php echo $this->fetch('content'); ?>

	</div>
	
<?php echo $this->Js->writeBuffer(); ?>

</body>
</html>