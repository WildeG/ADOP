<form class="form-horizontal col-xs-8 col-md-offset-2" action="/Auth/registration" method="post">
	<div class="form-group">
		<label for="username" class="col-xs-3 control-label">Логин:</label>
		<div class="col-xs-5">
			<input type="text" class="form-control" name="username" placeholder="Введите username">
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-xs-3 control-label">Адрес email:</label>
		<div class="col-xs-5">
			<input type="text" class="form-control" name="email" placeholder="Введите email">
		</div>
	</div>
	<div class="form-group">
		<label for="password" class="col-xs-3 control-label">Пароль:</label>
		<div class="col-xs-5">
			<input type="password" class="form-control" name="password" placeholder="Введите пароль">
		</div>
	</div>
	<div class="form-group">
    <label class="control-label col-xs-3" for="password_confirm">Повторите пароль:</label>
    <div class="col-xs-5">
      <input type="text" class="form-control" name="password_confirm" placeholder="Введите Имя">
    </div>
  </div>
	<div class="form-group">
    <div class="col-xs-offset-3 col-xs-5">
      <input type="submit" class="btn btn-primary" name="registration" value="Регистрация">
      <input type="reset" class="btn btn-default" value="Очистить форму">
    </div>
  </div>
</form>
<?php if (isset($error)) {
	echo "<div class='alert alert-danger'>"; print_r($error); echo "</div>";
}
