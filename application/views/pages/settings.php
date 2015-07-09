<fieldset>
	<legend>Settings</legend>

		<div class='box'>
			<div class='boxHeader'>
				User Information
				<span class='right exp_col'>
					<img src='<?php echo base_url(); ?>public/images/icons/arrowDown.png' />
					<input type='submit' value='Edit' />
				</span><br />
				
			</div>

			<div class='boxContent'>
			<label>Surame</label><br />
			<label>First Name</label><label>MI</label><label>Last Name</label><br />
			<label>Suffix</label><br />
			</div>
		</div><br />

		<div class='box'>
			<div class='boxHeader'>
				Contact Information
				<span class='right exp_col'>
					<img src='<?php echo base_url(); ?>public/images/icons/arrowDown.png' />
					<input type='submit' value='Edit' />
				</span><br />
			</div>

			<div class='boxContent'>
			<label>Address 1</label><label>Address 2</label><label>State</label><label>Zip</label><br />
			<label>Phone</label><br />
			<label>eMail</label><br />
			<label>Phone Number</label><br />
			<label>Allow eMail</label><br />
			<label>Allow Text</label><br />
			</div>
		</div><br />


		<div class='box'>
			<div class='boxHeader'>
				Account Settings
				<span class='right exp_col'>
					<img src='<?php echo base_url(); ?>public/images/icons/arrowDown.png' />
					<input type='submit' value='Edit' />
				</span><br />
			</div>

			<div class='boxContent'>
				<label>Type</label>
			</div>
		</div><br />


		<?php
		$acctType = 'paid';  // [ paid, free]
		if ($acctType == "paid"){
			echo"
				<div class='box'>
					<div class='boxHeader'>
						Credit Card Settings
						<span class='right exp_col'>
							<img src='".base_url()."public/images/icons/arrowDown.png' />
							<input type='submit' value='Edit' />
						</span><br />
					</div>

					<div class='boxContent'>
						<label class='wide'>Name on Card</label><br />
						<label>Number</label><br />
						<label>Expire</label><br />
						<label>CVV</label><br />
						<label>Type</label><br />
					</div>
				</div>
			";
		}
		?>

</fieldet>
