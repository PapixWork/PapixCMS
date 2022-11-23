<?php
	$json_func = file_get_contents('include/db/functions.json');
	$json_func = json_decode($json_func,true);

	$json_themes = file_get_contents('include/db/themes.json');
	$json_themes = json_decode($json_themes,true);

	if($json_func['user-choose-theme']==1)
	{
		if(isSet($_GET['theme']))
			$theme = $_GET['theme'];
		else if(isSet($_SESSION['theme']))
			$theme = $_SESSION['theme'];
		else if(isSet($_COOKIE['theme']))
			$theme = $_COOKIE['theme'];
		else if(isset($_SERVER['HTTP_ACCEPT_themeUAGE']))
			$theme = substr($_SERVER['HTTP_ACCEPT_themeUAGE'], 0, 2);
		else
		$theme = $json_themes['settings']['default'];
	}
	else
	{
		$theme = $json_themes['settings']['default'];
	}

	if(isset($json_themes['themes'][$theme]))
		$theme_current_code = $theme;
	else
		$theme_current_code = $json_themes['settings']['default'];
	
	$_SESSION['theme'] = $theme_current_code;
	setcookie('theme', $theme_current_code, time() + (3600 * 24 * 30));

	// include 'include/themes/'.$theme_current_code.'.php';

?>