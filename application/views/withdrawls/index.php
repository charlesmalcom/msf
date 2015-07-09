<?php $beginningBalance = '894.99'; ?>

<fieldset>
	<legend>Purchases & Withdrawls</legend>

	<label class='wide bold'>Account</label>
	<label class='wide bold'>Store</label>
	<label class='bold'>Amount</label>
	<label class='bold'>Balance</label>
	<label class='bold'>Actions</label><br />

	<?php foreach($withdrawlData as $row){ ?>
	
		<label class='wide'><?php echo $row->bankAccount; ?></label>
		<label class='wide'><?php echo $row->transactionFrom; ?></label>
		<label>$<?php echo $row->amount; ?></label>
		<label>$<?php echo $endingBalance = $beginningBalance - $row->amount; ?></label>
		<label>
			<a href='<?php echo base_url(); ?>withdrawls/update/<?php echo $row->id; ?>'><img src='<?php echo base_url(); ?>public/images/icons/edit.png' /></a>
			<a href='<?php echo base_url(); ?>withdrawls/delete/<?php echo $row->id; ?>'><img src='<?php echo base_url(); ?>public/images/icons/delete.png' /></a>
		</label><br />

	<?php } ?>

	<label class='wide'>&nbsp;</label>
	<label>&nbsp;</label>
	<label>&nbsp;</label>
	<label>$<?php echo $endingBalance ?></label>
	<label>&nbsp;</label><br /><hr />
	

	<label class='wide'>&nbsp;</label>
	<label>&nbsp;</label>
	<label>&nbsp;</label>
	<label class='wide'><a href='<?php echo base_url(); ?>withdrawls/create'><img src='<?php echo base_url(); ?>public/images/icons/add.png' /> New Withdrawl</a></label><br />

	<label class='wide'>&nbsp;</label>
	<label>&nbsp;</label>
	<label>&nbsp;</label>
	<label class='wide'><a href='<?php echo base_url(); ?>deposits/print'><img src='<?php echo base_url(); ?>public/images/icons/print.png' /> Print Page</a></label><br />

</fieldset>