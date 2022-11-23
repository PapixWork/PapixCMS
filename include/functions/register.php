<?php
	if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['rpassword']) && isset($_POST['email']))
	{
		$errors = array();
		
		if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
		{
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
			
			if(!$responseData->success)
			   $errors[]=$lang['incorrect-security'];
			
		} else $errors[]=$lang['incorrect-security'];
		
		if(!isValidUserName($_POST['username']))
			$errors[]=$lang['incorrect-usermane'];
		if(!isValidUserPassword($_POST['password']))
			$errors[]=$lang['incorrect-password'];
		if($_POST['password'] != $_POST['rpassword'])
			$errors[]=$lang['no-password-r'];
		if(!isValidEmail($_POST['email']))
			$errors[]=$lang['incorrect-email'];
		if($database->checkUserName($_POST['username']))
			$errors[]=$lang['already-user'];
		if($database->checkUserEmail($_POST['email']))
			$errors[]=$lang['already-email'];

		if(!preg_match('/^[A-Za-z0-9]{5,16}+$/', $_POST['password']))
			$errors[]=$lang['password-error'];

		foreach($errors as $error)
			print '<div class="alert alert-danger alert-dismissible fade in" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			  '.$error.'
			</div>';
		
		if(!count($errors))
		{
			$ref = isset($_GET['ref']) ? $_GET['ref'] : null;
			
			if(!$jsondataFunctions['active-referrals'])
				$ref=null;
			
			if($database->register($_POST['username'],$_POST['password'],$_POST['email'],$ref)){	
				print '<div class="alert alert-success" role="alert">
					  <h4 class="alert-heading">'.$lang['success'].'!</h4>
					  <p>'.$lang['success-register'].'</p>
					</div>';
			}
		}
	}
	
?>