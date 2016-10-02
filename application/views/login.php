<div class="container col-xs-4 col-md-offset-4" style="margin-top: 20%;">
    <?php if (isset($error)) {
        echo "<div class='alert alert-danger'>".$error."</div>"; 
    } ?>
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
            <a href="/registration" class="btn btn-warning" style="float:left">Рестрация</a>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success" style="float:right">Войти</button>
        </div>
    </form>
</div>