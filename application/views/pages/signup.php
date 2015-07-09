<div class='login'>
	<form action='<?php echo base_url(); ?>signup/process' method='POST'>

		<h4>Username Information</h4>
		<label for='username'>Username</label>				<input type='text' name='username'><br />
		<label for='password'>Password</label>				<input type='text' name='password'><br />
		<label for='password'>Password [x2]</label>			<input type='text' name='password2'><br />

		<h4>User Information</h4>
		<label for='surname'>Surname</label>				<?php echo form_dropdown('surname', $surname); ?><br />
		<label for='firstName'>First Name</label>			<input type='text' name='firstName'><br />
		<label for='middleName'>Middle Name</label>			<input type='text' name='middleName'><br />
		<label for='lastName'>Last Name</label>				<input type='text' name='lastName'><br />
		<label for='suffix'>Suffix</label>					<?php echo form_dropdown('suffix', $suffix); ?><br />

		<h4>Contact Inforamtion</h4>
		<label for='phoneNumber'>Phone Number</label>		<input type='text' name='phoneNumber' placeholder='000-000-0000'><br />
		<label for='phoneCarrier'>Phone Carrier</label>		<?php echo form_dropdown('phoneCarrier', $phoneCarriers); ?><br />
		<label for='email'>Email</label>					<input type='text' name='email' placeholder='name@domain.com'><br />
		<label for='allowEmail'>Allow eMail</label>			<input type='checkbox' name='allowEmail' value='1'><br />
		<label for='allowText'>Allow Text</label>			<input type='checkbox' name='allowText' value='1'><br />

		<h4>Account Information</h4>
		<label for='accountType'>Account Type</label>		<?php echo form_dropdown('accountType', $accountType); ?><br />

		<?php /*
		<h4>Credit Card Information</h4>
		<label for='ccName'>Name on Card</label><input type='text' name='ccName' placeholder='John Smith'><br />
		<label for='ccNum'>Number</label><input type='text' name='ccNum' placeholder='0000/00/00'><br />
		<label for='ccExp'>Expire Date</label><input type='text' name='ccExp' placeholder=''><br />
		<label for='ccCcv'>CCV</label><input type='text' name='ccCcv' placeholder='Ex. 275'><br />
		<label for='ccType'>Type</label><input type='text' name='ccType'><br />
		*/ ?>

		<input type='hidden' name='accountStatus' value='0'>
		<input type='hidden' name='globalStatus' value='1'>
		<input type='hidden' name='random' value='abc123'>

		<label>&nbsp;</label><input type='submit' value='Sign Up'><br />
	</form>
</div>