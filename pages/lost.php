<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-11 col-md-12 col-sm-offset-2 col-md-offset-3">
            <form role="form" method="post" action="">
				<div class="page-hd">
					<div class="bd-c">
						<h2 class="pre-social"><?php if($message==7) print $lang['change-password']; else print $lang['account-recovery']; ?></h2>
					</div>
				</div>
				<?php
					if(isset($_GET['email']) && isset($_GET['code']) && !empty($_GET['email']) && !empty($_GET['code']) && isValidEmail($_GET['email']))
					{
						if($message==6)
						{
							print '<div class="alert alert-danger alert-dismissible fade in" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>';
							print $lang['incorrect-recovery'];
							print '</div>';
						}
						else if(isset($_POST['password']) && isset($_POST['rpassword']) && $message==9)
						{
							$message = 7;
							print '<div class="alert alert-danger alert-dismissible fade in" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>';
							print $lang['no-password-r'];
							print '</div>';
						}
						else if(isset($_POST['password']) && isset($_POST['rpassword']) && $message==8)
						{
							$message = 11;
							print '<div class="alert alert-success alert-dismissible fade in" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>';
							print $lang['success-change-password'];
							print '</div>';
						}
						else if(isset($_POST['password']) && isset($_POST['rpassword']) && $message==10)
						{
							$message = 7;
							print '<div class="alert alert-danger alert-dismissible fade in" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>';
							print $lang['incorrect-password'];
							print '</div>';
						}
					} else if(isset($_POST['username']) && isset($_POST['email']))
					{
						if($message==5)
						{
							print '<div class="alert alert-danger alert-dismissible fade in" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>';
							print $lang['incorrect-security'];
							print '</div>';
						}
						else {
							print '<div class="alert alert-info alert-dismissible fade in" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>';
							print $lang['email-recovery'];
							print '</div>';
							
							if($message==1)
							{
								$alt_message = $lang['code-delete-chars'];
								$subject = $lang['account-recovery'];
								$sendName = $_POST['username'];
								$sendEmail = $_POST['email'];
								
								$code = generateSocialID(32);
								update_passlost_token($_POST['username'], $code);
								$html_mail = recoveryPassword($code, $_POST['email'], $_POST['username']);
								include 'include/functions/sendEmail.php';
							}
						}
					}
					require 'include/captcha/simple-php-captcha.php';
					$_SESSION['captcha_lost'] = simple_php_captcha();
					
				if($message!=11) {
				?>
				<table class="table table-hover">
					<tbody>
						<?php if($message==7) { ?>
						<tr>
							<td><?php print $lang['password']; ?>:</td>
							<td><input class="form-control" name="password" id="password" pattern=".{5,16}" maxlength="16" placeholder="<?php print $lang['password']; ?>" required="" title="Între 5 și 16 caractere permise." type="password"></td>
						</tr>
						<tr>
							<td><?php print $lang['rpassword']; ?>:</td>
							<td><input class="form-control" name="rpassword" id="rpassword" pattern=".{5,16}" maxlength="16" placeholder="<?php print $lang['password']; ?>" required="" title="Între 5 și 16 caractere permise." type="password">
							<p class="text-danger" id="checkpassword"></p>
							</td>
						</tr>
						<?php } else { ?>
						<tr>
							<td><?php print $lang['user-name']; ?>:</td>
							<td><input class="form-control" name="username" pattern=".{5,16}" maxlength="16" pattern="[A-Za-z0-9]" placeholder="<?php print $lang['user-name']; ?>..." required="" title="Între 5 și 16 caractere permise." type="text" autocomplete="off"></td>
						</tr>
						<tr>
							<td><?php print $lang['email-address']; ?>:</td>
							<td><input class="form-control" name="email" pattern=".{7,64}" maxlength="64" placeholder="<?php print $lang['email-address']; ?>" required="" title="Maxim 64 caractere." type="email"></td>
						</tr>
						<tr>
							<td>Captcha:</td>
							<td>
							<div class="g-recaptcha"style="maring-left:-50px;" data-theme="<?php print RECAPTCHA_THEME ?>" data-sitekey="<?php print RECAPTCHA_PUBLIC_KEY ?>"></div>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
				<hr>
				<input type="submit" value="<?php if($message==7) print $lang['change-password']; else print $lang['account-recovery']; ?>" class="btn btn-<?php if($message==7) print 'primary'; else print 'primary'; ?> btn-lg btn-block" tabindex="7">
			<?php } ?>
            </form>
        </div>
    </div>
</div>