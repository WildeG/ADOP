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