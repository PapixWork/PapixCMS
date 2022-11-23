<?php
	if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
	{
		$username = strip_tags($_POST['username']);
		$password = strip_tags($_POST['password']);
		
		$secret = RECAPTCHA_PRIVATE_KEY;

		$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
		$responseData = json_decode($verifyResponse);
		
		if($responseData->success)
			$login_info = $database->doLogin($username,$password);
		else $login_info = array(6);
	}
?>