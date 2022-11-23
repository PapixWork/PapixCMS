<?php
	@ob_start();
	include 'include/functions/header.php';
?>
<!DOCTYPE html>
<html lang="<?php print $language_code; ?>">
<!--<![endif]-->

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="UTF-8" />

	<title><?php print $site_title.' - '.$title; if($offline) print ' - '.$lang['server-offline']; ?></title>

	<?php $load_theme = "themes/".$theme_current_code."/theme.php"; if(file_exists($load_theme)) { include($load_theme); } ?>
	<?php $load_theme = "themes/".$theme_current_code."/theme.php"; if(!file_exists($load_theme)) { die(print $lang['error-load-theme']); } ?>

	<?php $load_theme = "thematic/config.php"; if(file_exists($load_theme)) { include($load_theme); } ?>
	<?php $load_theme = "thematic/config.php"; if(!file_exists($load_theme)) { die(print $lang['error-load-thematic']); } ?>

	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>


<body class="page page-parent page-template page-template-template-blog-php">

	<video autoplay="" muted="" loop="" id="VideoBackground">
		<source src="<?php print $site_url; ?>themes/<?php print $theme_current_code; ?>/background/background.mp4" type="video/mp4">
		Your browser does not support HTML5 video.
	</video>

	<div class="logo"> 
		<a href="<?php print $site_url; ?>">
			<img class="pulse" src="<?php print $site_url; ?>themes/<?php print $theme_current_code; ?>/images/logo.png" />
		</a>
	</div>

	<div class="navbar">
		<?php
		if(!$offline)
		{
			echo('<a href='.$site_url.'news'.'>'.$lang['news'].'</a>');
		
			if(!$database->is_loggedin())
			{
				echo('<a href='.$site_url.'users/register'.'>'.$lang['register'].'</a>');
			
			}
		
			echo('<a href='.$site_url.'download'.'>'.$lang['download'].'</a>');
		
			echo '
				<div class="dropdown1">
					<button class="dropbtn1">'.$lang['ranking'].' <i class="fa fa-caret-down"></i> </button>
					<div class="dropdown-content1">
					<a href="'.$site_url.'ranking/players">'.$lang['players'].'</a>
					<a href="'.$site_url.'ranking/guilds">'.$lang['guilds'].'</a>
					</div>
				</div>';
		}
		else
		{
			echo('<a href='.$site_url.'>'.$lang['server-offline'].'</a>');
		}
		
		
		if(count($json_languages['languages'])>1)
		{
			echo'<div class="dropdown1">
					<button class="dropbtn1">'.$json_languages['languages'][$language_code].' <i class="fa fa-caret-down"></i> </button>
					<div class="dropdown-content1">';
		
			foreach($json_languages['languages'] as $key => $value)
			{
				print'<a href="'.$site_url.'lang/'.$key.'">'.$value.'</a>';
			}
		
			echo'</div></div>';
		}
		
		
		if($jsondataFunctions['user-choose-theme']==1)
		{
			echo'<div class="dropdown1">
					<button class="dropbtn1"> '.$json_themes['themes'][$theme_current_code].' <i class="fa fa-caret-down"></i> </button>
					<div class="dropdown-content1">';
		
			foreach($json_themes['themes'] as $key => $value)
			{
				print'<a href="'.$site_url.'theme/'.$key.'">'.$value.'</a>';
			}
		
			echo'</div></div>';
		}
		?>

	</div>


		<div class="article">
			<div class="page-width">
				<div class="col-md-8">
					<div class="page-padding mt2cms2-c page-bd">
						<div class="mt2cms2-c-l">
							<?php
								include 'pages/'.$page.'.php';
							?>
						</div>
					</div>
				</div>
	
				<div class="col-md-4">
					<div class="mt2cms2-c-s">
						<div class="bd-c">
							<ul>
								<?php include 'include/sidebar/user.php'; ?>
								<?php if(!$offline && $statistics) include 'include/sidebar/statistics.php'; ?>
								<?php include 'include/sidebar/ranking.php'; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>


	<div class="mt2cms2-footer">
		<div class="footer-nav">
			<div class="page-width">
				<div class="page-padding">
					<?php if($social_links) { ?>
						<div class="social cms2-g">
							<div class="cms2-u">
								<ul class="cms2-g">
									<?php print $social_links; ?>
								</ul>
							</div>
						</div>
					<?php } ?>
					
					<p class="cms2-u copyright">
						<div class="row">
							<div class="col-md-8">
								&copy; Copyright <?php 
														$copyright_year = date('Y');
														if($copyright_year > 2021)
															print '2021 - '.$copyright_year;
														else print $copyright_year;
														print ' '.$site_title;
													?>
							</div>
							<div class="col-md-4">
								<p style="text-align: right">Power by <a target="_blank" href="https://papix.work/">Papix</a> from ❤️ | CMS v<?php print CMS_VERSION ?></p>
								<br>
								<br>
							</div>
						</div>
					</p>
				</div>
			</div>
		</div>
	</div>

	<div id="fb-root"></div>
	
	<script type="text/javascript" src="<?php print $site_url; ?>themes/<?php print $theme_current_code; ?>/js/jquery-2.2.4.min.js"></script>
	<?php include 'include/functions/footer.php'; ?>
	<script src="<?php print $site_url; ?>themes/<?php print $theme_current_code; ?>/js/tether.min.js"></script>
	<script src="<?php print $site_url; ?>themes/<?php print $theme_current_code; ?>/js/bootstrap.min.js"></script>
</body>

</html>