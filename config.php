<?php
	// URL
	$site_url = "https://cms.papix.work/";

	// Game database
	$host = "ip_here";
	$user = "root";
	$password = "pass_here";

	// Email Settings
	$SMTP_debug = 0; // 0 = OFF | 1 = Errors and messages | 2 = Messages only
	$SMTP_timeout = 30;
	$SMTPAuth = true;
	$SMTPSecure = "ssl";
	$EmailHost = "mail.privateemail.com";
	$emailPort = 465;
	$email_username = "example@papix.work";
	$email_password = "Password";

	// Register
	$safebox_size = 1;

	// Fake Statistics
	$fake_stats_geral = false; // true = ON | false = OFF
	$fake_stats_guild = false; // true = ON | false = OFF

	define("FAKE_STATS_GERAL", "2"); // [value] = multiply the real values (Example you have 5 accounts and enter the value 2 will show 10).
	define("FAKE_STATS_GUILD", "2"); // [value] = multiply the real values (Example you have 5 guilds and enter the value 2 will show 10).

	// Thematic Effects
	define("christmas", "0"); // 0 = OFF | 1 = ON

	// Recaptcha v2
	define("RECAPTCHA_PUBLIC_KEY", "public_key_here");
	define("RECAPTCHA_PRIVATE_KEY", "private_key_here");
	define("RECAPTCHA_THEME", "light"); // dark/light

	// Papix CMS
	define("CMS_VERSION", "1");