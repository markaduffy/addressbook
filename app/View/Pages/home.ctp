<script type="text/javascript">

$(document).ready(function() {

    $("#contact-form").validate();

    $("#first-name").rules("add", {required:true});
    $("#last-name").rules("add", {required:true});


});

</script>
<div class="row">
	<div class="col-md-4">
		<p>Welcome to your Address Book. Enter your name to create a new address book.</p>
		<?php echo $this->Form->create('User', array('id' => 'contact-form', 'action' => 'add', 'type' => 'post', 'inputDefaults' => array('div' => false))); ?>
		<div class="form-group">
			<span class="required">*</span> <?php echo $this->Form->input('first_name', array('class' => 'form-control', 'id' => 'first-name', 'placeHolder' => 'Enter First Name')); ?>
		</div>
		<div class="form-group">
			<span class="required">*</span> <?php echo $this->Form->input('last_name', array('class' => 'form-control', 'id' => 'last-name', 'placeHolder' => 'Enter Last Name')); ?>
		</div>
		<span class="required">*</span> Required 
	<?php echo $this->Form->end('Save'); ?>
	</div>
</div>