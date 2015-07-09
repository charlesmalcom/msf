<?php
	
	//remove cookie
	delete_cookie('logged_in');

	//remove session date
	$this->session->unset_userdata('some_name');
?>

<div class='middleScreen'>
	<p>Thanks for using My Simple Finances</p>
	<p>Click <a href='<?php echo base_url(); ?>'>here</a> to log back in.</p>
</div>
