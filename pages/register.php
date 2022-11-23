<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-11 col-md-12 col-sm-offset-2 col-md-offset-3">
			<div class="page-hd" >
				<div class="bd-c">
					<h2 class="pre-social"><?php print $lang['register']; ?></h2>
				</div>
			</div>
		<?php if($jsondataFunctions['active-registrations']==1) { ?>
            <form role="form" method="post" action="">
				<?php
					include 'include/functions/register.php';
				?>
				<table class="table table-hover">
					<tbody>
						<tr>
							<td><?php print $lang['user-name']; ?>:</td>
							<td><input class="form-control" name="username" id="username" pattern=".{5,16}" maxlength="16" pattern="[A-Za-z0-9]" placeholder="<?php print $lang['user-name']; ?>..." required="" type="text" autocomplete="off">
							<p class="text-danger" id="checkname"></p>
							<p class="text-danger" id="checkname2"></p>
							</td>
						</tr>
						<tr>
							<td><?php print $lang['password']; ?>:</td>
							<td><input class="form-control" name="password" id="password" pattern=".{5,16}" maxlength="16" placeholder="<?php print $lang['password']; ?>" required="" type="password"></td>
						</tr>
						<tr>
							<td><?php print $lang['rpassword']; ?>:</td>
							<td><input class="form-control" name="rpassword" id="rpassword" pattern=".{5,16}" maxlength="16" placeholder="<?php print $lang['password']; ?>" required="" type="password">
							<p class="text-danger" id="checkpassword"></p>
							</td>
						</tr>
						<tr>
							<td><?php print $lang['email-address']; ?>:</td>
							<td><input class="form-control" name="email" id="email" pattern=".{7,64}" maxlength="64" placeholder="ex@test.com" required="" type="email">
							<p class="text-danger" id="checkemail"></p>
							</td>
						</tr>
						<tr>
							<td>Captcha:</td>
							<td>
							<div class="g-recaptcha"style="maring-left:-50px;" data-theme="<?php print RECAPTCHA_THEME ?>" data-sitekey="<?php print RECAPTCHA_PUBLIC_KEY ?>"></div>
							</td>
						</tr>
					</tbody>
				</table>
				<hr>
				<input type="submit" value="<?php print $lang['register']; ?>" class="btn btn-primary btn-lg btn-block" tabindex="7">
            </form>
		<?php } else { ?>
			<div class="alert alert-info" role="alert">
				<strong>Info!</strong> <?php print $lang['disabled-registrations']; ?>
			</div>
		<?php } ?>
        </div>
    </div>

</div>