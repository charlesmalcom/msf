<?php 
	$sessionData = $this->session->all_userdata();
	$userID = $sessionData['0']['id'];
?>

<div class='login'>
	<p>New Deposit</p>
	<form action='<?php echo base_url(); ?>deposits/add' method='POST'>
		<label for='transactionFrom'>From</label>		<?php echo form_dropdown('transactionFrom', $depositor); ?><br />
		<label for='expCategory'>Category</label>		<?php echo form_dropdown('expCategory', $categories); ?><br />
		<label for='date'>Date</label>					<input type='date' name='date' id='datepicker' placeholder='0000-00-00'><br />
		<label for='amount'>Amount</label>				<input type='text' name='amount' placeholder='0000.00'><br />
		<label for='bankAccount'>Account</label>		<input type='text' name='bankAccount' value='PCB'><br />
		
		<label for='description'></label>				<textarea name='description' placeholder='Type your notes here.'></textarea><br />

														<input type='hidden' name='userID' value='<?php echo $userID; ?>'>
														<input type='hidden' name='status' value='Pending'>
														<input type='hidden' name='receiptID' value='NULL'>
														<input type='hidden' name='type' value='dep'>
		<label>&nbsp;</label>							<input type='submit' value='Create'><br />
	</form>
</div>