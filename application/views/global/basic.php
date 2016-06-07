<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>

<link href="public/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo URL::base(); ?>public/css/style.css" rel="stylesheet" type="text/css" />

<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

<?php if (isset($styles)) { foreach($styles as $style): ?>
    <link href="<?php echo URL::base(); ?>public/css/<?php echo $style; ?>.css" rel="stylesheet" type="text/css" />
<?php endforeach; } ?>

</head>
<body>
	<!-- Фиксированная панель -->
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="<?php echo URL::base(); ?>"><?php echo $title; ?></a>
			</div>
			<div id='auth' class="navbar-collapse collapse">
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
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row-fluid">
			<?php echo $content; ?>
		</div>
	</div>

	<footer class="footer">
		<div class="container">
			<p class="text-muted">© 2016 ПТК НовГУ - Все материалы, находящиеся на сайте,<br>охраняются в соответствии с законодательством РФ, в том числе, об авторском праве и смежных правах</p>
		</div>
	</footer>
	
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
</html>
<script type="text/javascript">
function logs() {
	var login = document.getElementById('login').value;
	var pass = document.getElementById('pass').value;
  	$.ajax({
    	type: "POST",
   		url: "/Auth/auth",
    	data: {login:login,
    			pass:pass},
    	dataType: "html",
		success: function(data) { // когда получаем ответ
			// if(!data.error){ // Если ошибки нет, то удаляем строку
				$("#res").html(data);
    	},
    	error: function(data) {
      	alert('error');
    	}
  });
};
</script>