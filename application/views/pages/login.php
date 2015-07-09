<div class='login middleScreen'>
	<form action='<?php echo base_url(); ?>login/verify' method='POST'>
		<label for='username'>Username</label><input type='text' name='username'><br />
		<label for='password'>Password</label><input type='password' name='password'><br />
		<label>&nbsp;</label><input type='checkbox' name='rememberMe'>Remember Me<br />
		<label>&nbsp;</label><input type='submit' value='Login'><br />
	</form>
</div>