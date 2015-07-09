<div class='login'>
	<p>Update Deposit</p>
	<form action='<?php echo base_url(); ?>deposits/change' method='POST'>

		<?php foreach($depositsData as $row){ ?>

		<label for='account'>Account</label><input type='text' name='account' value='<?php echo $row->accountID; ?>'><br />
		<label for='store'>Store</label><input type='text' name='store' value='<?php echo $row->transactionFrom; ?>'><br />
		<label for='date'>Date</label><input type='date' name='date' value='<?php echo $row->date; ?>'><br />
		<label for='amount'>Amount</label><input type='text' name='amount' value='<?php echo $row->amount; ?>'><br />
		<label for='status'>Status</label><input type='text' name='status' value='<?php echo $row->status; ?>'><br />

		<label>&nbsp;</label><input type='submit' value='Update'><br />

		<?php } ?>

	</form>
</div>