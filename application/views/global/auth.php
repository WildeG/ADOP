<?php if (isset($bg[0]['id_user']) || isset($_COOKIE["TestCookie"])) { ?>
	<form class="navbar-form navbar-right" name='logform' role="form">
		<div class="form-group">
			<a href="/account?id=<?php echo $bg[0]['id_user']; ?>" title="Личный кабинет"><h4 style="padding:0; margin: 7px 0 0 0"><span class="glyphicon glyphicon-user"></span>&nbsp<?php echo $bg[0]['full_name']; ?></h4></a>
		</div>
	</form>
<?php } else { ?>
<form class="navbar-form navbar-right" name='logform' role="form">
	<div class="form-group">
		<input name="login" id="login" type="text" placeholder="Логин" class="form-control">
	</div>
	<div class="form-group">
		<input name="pass" id="pass" type="password" placeholder="Пароль" class="form-control">
	</div>
	<button id='log_btn' onclick="logs()" type="button" class="btn btn-info">Войти</button>
	<a href="<?php echo URL::base(); ?>registration"><label class="btn btn-warning">Регистрация</label></a>
</form>
<?php if (isset($bg)) {echo $bg; }  } ?>