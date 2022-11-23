<?php
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
die ("<h2>Access Denied!</h2> This file is protected and not available to public.");
}
?>

	<link rel="shortcut icon" href="<?php print $site_url; ?>themes/<?php print $theme_current_code; ?>/images/favicon.png" />

	<link rel="stylesheet" href="<?php print $site_url; ?>themes/<?php print $theme_current_code; ?>/css/eason-displaycaps-min.css">
	<link rel="stylesheet" href="<?php print $site_url; ?>themes/<?php print $theme_current_code; ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php print $site_url; ?>themes/<?php print $theme_current_code; ?>/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php print $site_url; ?>themes/<?php print $theme_current_code; ?>/css/costume.css">
	<link rel='stylesheet' href='<?php print $site_url; ?>themes/<?php print $theme_current_code; ?>/css/style.css' type='text/css' media='all' />
	
	<?php if($page=="admin" && $a_page=="player_edit") { ?>
	<link rel='stylesheet' href='<?php print $site_url; ?>themes/<?php print $theme_current_code; ?>/css/bootstrap-select.css'/>
	<?php } ?>