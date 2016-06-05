<form class="form-horizontal col-xs-8 col-md-offset-2">
	<div class="form-group">
		<label for="inputEmail" class="col-xs-3 control-label">Адрес email:</label>
		<div class="col-xs-5">
			<input type="email" class="form-control" id="inputEmail" placeholder="Введите email">
		</div>
	</div>
	<div class="form-group">
		<label for="inputPassword" class="col-xs-3 control-label">Пароль:</label>
		<div class="col-xs-5">
			<input type="password" class="form-control" id="inputPassword" placeholder="Введите пароль">
		</div>
	</div>
	<div class="form-group">
    <label class="control-label col-xs-3" for="lastName">Фамилия:</label>
    <div class="col-xs-5">
      <input type="text" class="form-control" id="lastName" placeholder="Введите фамилию">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3" for="firstName">Имя:</label>
    <div class="col-xs-5">
      <input type="text" class="form-control" id="firstName" placeholder="Введите имя">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3" for="fatherName">Отчество:</label>
    <div class="col-xs-5">
      <input type="text" class="form-control" id="fatherName" placeholder="Введите отчество">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3">Группа:</label>
    <div class="col-xs-5">
      <select class="form-control">
        <option></option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-3">Год поступления:</label>
    <div class="col-xs-5">
      <select class="form-control">
      	<?php	for ($i=1990; $i < date('Y'); $i++) {
      		if ($i == (date('Y')-4)) { $selected = " selected "; } else { $selected = ''; };
      		echo "<option ".$selected." >".$i."</option>";
      	} ?>
      </select>
    </div>
  </div>
	<div class="form-group">
    <div class="col-xs-offset-3 col-xs-5">
      <input type="submit" class="btn btn-primary" value="Регистрация">
      <input type="reset" class="btn btn-default" value="Очистить форму">
    </div>
  </div>
</form>