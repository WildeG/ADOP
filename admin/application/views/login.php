<form method="post" action="<?php echo URL::base(); ?>Auth/login" class="login">
    <p>
      <label for="login">Логин:</label>
      <input type="text" name="username" id="login" placeholder="Логин">
    </p>

    <p>
      <label for="password">Пароль:</label>
      <input type="password" name="password" id="password" value="123456">
    </p>

    <p class="login-submit">
      <button type="submit" class="login-button">Войти</button>
    </p>
  </form>