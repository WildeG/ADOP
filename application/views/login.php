<div class="container col-xs-4 col-md-offset-4" style="margin-top: 20%;">
	<form method="post" action="<?php echo URL::base(); ?>Auth/login">
        <div class="form-group">
            <label for="login">Логин:</label>
            <input type="text" name="username" class="form-control" id="login" placeholder="Логин">
        </div>
        <div class="form-group">
            <label for="password">Пароль:</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="123456">
        </div>
         <div class="form-group">
            <button type="button" class="btn btn-warning" style="float:left">Рестрация</button>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success" style="float:right">Войти</button>
        </div>
    </form>
</div>