<div class="row top-nav">
	<div class="col-md-12">
		<ul class="nav nav-tabs" role="tablist">
		  <li class="active"><a href="/contacts/">Contacts</a></li>
		  <?php if (!empty($contacts)){ ?><li><a href="/contacts/map">Map</a><?php } ?></li>
		</ul>
	</div>
</div>

<div class="row">
	<div class="col-md-4">
		<p>Please add your contacts to the address book, using the form below.</p>
		<?php echo $this->Form->create('Contact', array('id' => 'contact-form', 'action' => 'add', 'type' => 'post', 'inputDefaults' => array('div' => false))); ?>
		<?php echo $this->Form->hidden('user_id', array('value' => $user_id)); ?>
		<div class="form-group">
			 <span class="required">*</span> <?php echo $this->Form->input('full_name', array('class' => 'form-control', 'id' => 'full-name', 'placeHolder' => 'Enter Full Name')); ?>
		</div>
		
		<div class="form-group">
			<span class="required">*</span> <?php echo $this->Form->input('address1', array('label' => 'Address 1', 'class' => 'form-control', 'id' => 'address1', 'placeHolder' => 'Enter Address 1')); ?>
		</div>
		<div class="form-group">
			<?php echo $this->Form->input('address2', array('label' => 'Address 2', 'class' => 'form-control', 'id' => 'address2', 'placeHolder' => 'Enter Address 2')); ?>
		</div>
		<div class="form-group">
			<span class="required">*</span> <?php echo $this->Form->input('city', array('label' => 'City', 'class' => 'form-control', 'id' => 'city', 'placeHolder' => 'Enter City')); ?>
		</div>
		<div class="form-group">
			<span class="required">*</span> <?php echo $this->Form->input('state', array('type' => 'select', 'label' => 'State', 'class' => 'form-control', 'id' => 'state', 'placeHolder' => 'Enter State', 'options' => $state_list)); ?>
		</div>
		<div class="form-group">
			<?php echo $this->Form->input('zip', array('label' => 'Zip', 'class' => 'form-control', 'placeHolder' => 'Enter Zip')); ?>
		</div>
		<div class="form-group">
			<?php 

				if (!empty($contacts)){
					echo $this->Js->submit('Save', array(
						'url' => array(
							'action' => 'add',
							'method' => 'post'
						),
					    'div' => false,
					    'type' => 'json',
					    'async' => true,
					    'success' => "refresh_table(data)"
					));
				} else {
					 echo $this->Form->submit('Save', array('div' => false));
				}

			?>
			<?php echo $this->Form->button('Reset', array('type' => 'reset')); ?>

		</div>

		<span class="required">*</span> Required 
		
	<?php echo $this->Form->end(); ?>
	</div>
	<div class="col-md-6 col-md-offset-2">

			<?php 

				if (!empty($contacts)){

					echo '<table id="address-table" class="table table-condensed"><tr><th>Name</th><th>Address</th><th>Lat/Lon</th></tr>';
				
					foreach($contacts as $key => $value){ 

			?>

			<tr>
				<td><a href="" data-toggle="modal" data-target="#myModal"><?php echo $value['Contact']['full_name'] ?></a></td>
				<td>
					<?php echo $value['Contact']['address1'] ?><br />
					<?php echo $value['Contact']['address2'] ?><br />
					<?php echo $value['Contact']['city'] ?><br />
					<?php echo $value['Contact']['state'] ?><br />
					<?php echo $value['Contact']['zip'] ?><br />
				</td>
				<td>
					<?php echo $value['Contact']['lat'] ?> <?php echo $value['Contact']['lng'] ?>
				</td>
			</tr>

			<?php 

					}

					echo "</table>";

				}

			?>

	</div>
</div>

<script type="text/javascript">

function refresh_table(data){

	console.log(data)

	$('#address-table tr:first').after(
		'<tr><td><a href="" data-toggle="modal" data-target="#myModal">' + data.Contact.full_name + '</a></td><td>' 
		+ data.Contact.address1 + '<br />' 
		+ data.Contact.address2 + '<br />' 
		+ data.Contact.city + '<br />' 
		+ data.Contact.state + '<br /></td><td>'
		+ data.Contact.lat + ' '
		+ data.Contact.lng + '</td></tr>');
	$('#address-table tr').eq(1).hide().show('slow');

}

</script>