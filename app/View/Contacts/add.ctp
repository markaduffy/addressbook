<div class="addressbooks form">
<?php echo $this->Form->create('Addressbook'); ?>
	<fieldset>
		<legend><?php echo __('Add Addressbook'); ?></legend>
	<?php
		echo $this->Form->input('full_name');
		echo $this->Form->input('address1');
		echo $this->Form->input('address2');
		echo $this->Form->input('city');
		echo $this->Form->input('state');
		echo $this->Form->input('zip');
		echo $this->Form->input('lat');
		echo $this->Form->input('lon');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Addressbooks'), array('action' => 'index')); ?></li>
	</ul>
</div>
