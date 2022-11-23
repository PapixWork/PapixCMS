<?php
	$myEmail = getAccountEmail($_SESSION['id']);
	$message = 0;
	if(isset($_GET['code']) && !empty($_GET['code']) && strlen($_GET['code'])==32)
	{
		if(check_email_token($myEmail, $_GET['code']))
		{
			updateNewEmail();
			update_email_token($_SESSION['id'], '');
			header("Location: ".$site_url."user/administration");
			die();
		} else {
			$message = 5;
		}
	} else if(isset($_POST['email']))
	{
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
				if(!$database->checkUserEmail($email))
				{
					$code = generateSocialID(32);
					update_email_token($_SESSION['id'], $code);
					update_new_email($_SESSION['id'], $email);
					$message = 4;
				} else $message = 1;
				
			} else $message = 2;
		} else $message = 3;
	}

?>