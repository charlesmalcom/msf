<fieldset>
	<legend>Settings</legend>

	<?php foreach($userData as $row){ ?>

		<div class='box'>
			<div class='boxHeader'>
				User Information
				<span class='right exp_col'>
					<img src='<?php echo base_url(); ?>public/images/icons/arrowDown.png' />
					<input type='submit' value='Edit' />
				</span><br />
			</div>

			<div class='boxContent'>
			<label>Surname</label><?php echo $row->surname; ?><br />
			<label>First Name</label><?php echo $row->firstName; ?><br />
			<label>Middle Name</label><?php echo $row->middleName; ?><br />
			<label>Last Name</label><?php echo $row->lastName; ?><br />
			<label>Suffix</label><?php echo $row->suffix; ?><br />
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
			<label>Phone Number</label><?php echo $row->phoneNumber; ?><br />
			<label>Phone Carrier</label><?php echo $row->phoneCarrier; ?><br />
			<label>eMail Address</label><?php echo $row->email; ?><br />
			<label>Allow eMail</label><?php
				if($row->allowEmail == '1'){ echo 'Yes'; }
				else if($row->allowEmail == '0'){ echo 'No'; }
				 ?><br />
			<label>Allow Text</label><?php
				if($row->allowText == '1'){ echo 'Yes'; }
				else if($row->allowText == '0'){ echo 'No'; }
				?><br />
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
				<label>Type</label><?php echo $row->accountType; ?>
			</div>
		</div><br />


		<div class='box'>
			<div class='boxHeader'>
				Bank Accounts
				<span class='right exp_col'>
					<img src='<?php echo base_url(); ?>public/images/icons/arrowDown.png' />
					<input type='submit' value='Edit' />
				</span><br />
			</div>

			<div class='boxContent'>
				<?php foreach($accountData as $row_ba){ ?>
					<label>Account</label><?php echo $row_ba->accountName; ?><br />
				<?php } ?>
			</div>

		</div><br />


		<?php
		if ($row->accountType == "paid"){							// [ paid, free]
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

	<?php } ?>

</fieldet>
