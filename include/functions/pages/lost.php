<?php
	$message = 0;
	if(isset($_GET['email']) && isset($_GET['code']) && !empty($_GET['email']) && !empty($_GET['code']) && isValidEmail($_GET['email']))
	{
		if(check_recovery($_GET['email'], $_GET['code']))
		{
			$message = 7;//bun
			if(isset($_POST['password']) && isset($_POST['rpassword']))
			{
				if($_POST['password']==$_POST['rpassword'])
				{
					if(isValidUserPassword($_POST['password']))
					{
						$password = getHashPassword($_POST['password']);
						update_passlost_token_by_email($_GET['email']);
						update_password_by_email($_GET['email'], $password);
						$message = 8;
					}
					else $message = 10;
				}
				else $message = 9;
			}
		} else {
			$message = 6;
		}
	} else if(isset($_POST['username']) && isset($_POST['email']))
	{

		$username = strip_tags($_POST['username']);
		$email = $_POST['email'];

		$data = array(
					'secret' => RECAPTCHA_PRIVATE_KEY,
					'response' => $_POST['g-recaptcha-response']
				);

		$verify = curl_init();
		curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
		curl_setopt($verify, CURLOPT_POST, true);
		curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($verify);
		$responseData = json_decode($response);


		if($responseData->success)
		{
			if(isValidEmail($email))
			{
				$message = $database->Lost($username,$email);
			} else $message = 4;
		} else $message = 5;
	}
?>