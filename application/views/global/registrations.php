<form class="form-horizontal col-xs-8 col-md-offset-2" action="/Insert/adduser" method="post">
	<div class="form-group">
		<label for="inputEmail" class="col-xs-3 control-label">Адрес email:</label>
		<div class="col-xs-5">
			<input type="email" class="form-control" name="inputEmail" placeholder="Введите email">
		</div>
	</div>
	<div class="form-group">
		<label for="inputPassword" class="col-xs-3 control-label">Пароль:</label>
		<div class="col-xs-5">
			<input type="password" class="form-control" name="inputPassword" placeholder="Введите пароль">
		</div>
	</div>
	<div class="form-group">
    <label class="control-label col-xs-3" for="full_name">Полное имя:</label>
    <div class="col-xs-5">
      <input type="text" class="form-control" name="full_name" placeholder="Введите Имя">
    </div>
  </div>
	<div class="form-group">
    <div class="col-xs-offset-3 col-xs-5">
      <input type="submit" class="btn btn-primary" value="Регистрация">
      <input type="reset" class="btn btn-default" value="Очистить форму">
    </div>
  </div>
</form>