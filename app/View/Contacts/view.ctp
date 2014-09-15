<div class="addressbooks view">
<h2><?php echo __('Addressbook'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($addressbook['Addressbook']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Full Name'); ?></dt>
		<dd>
			<?php echo h($addressbook['Addressbook']['full_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address1'); ?></dt>
		<dd>
			<?php echo h($addressbook['Addressbook']['address1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address2'); ?></dt>
		<dd>
			<?php echo h($addressbook['Addressbook']['address2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($addressbook['Addressbook']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo h($addressbook['Addressbook']['state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zip'); ?></dt>
		<dd>
			<?php echo h($addressbook['Addressbook']['zip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lat'); ?></dt>
		<dd>
			<?php echo h($addressbook['Addressbook']['lat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lon'); ?></dt>
		<dd>
			<?php echo h($addressbook['Addressbook']['lon']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Addressbook'), array('action' => 'edit', $addressbook['Addressbook']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Addressbook'), array('action' => 'delete', $addressbook['Addressbook']['id']), array(), __('Are you sure you want to delete # %s?', $addressbook['Addressbook']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Addressbooks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Addressbook'), array('action' => 'add')); ?> </li>
	</ul>
</div>
