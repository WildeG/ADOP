<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>

<link href="/public/css/bootstrap.min.css" rel="stylesheet">


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="/public/css/bootstrap-select.min.css">


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
				<a class="navbar-brand" href="<?php echo URL::base(); ?>">Панель управления</a>
			</div>
			<?php if(Auth::instance()->logged_in()) { ?>
			<div class="navbar-collapse collapse">
				<form class="navbar-form navbar-right" role="form">
					<a href="<?php echo URL::base(); ?>"><span class="glyphicon glyphicon-home" style="font-size:30px;letter-spacing:15px;"></span></a>
					<a href="<?php echo URL::base(); ?>exit"><span class="glyphicon glyphicon-log-out" style="font-size:30px;letter-spacing:15px;"></span></a>
				</form>
			</div>
			<?php } ?>
		</div>
	</div>

	<div class="container" style="padding-bottom: 40px;">
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
<script src="/public/js/bootstrap.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="/public/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="/public/js/i18n/defaults-ru_RU.min.js"></script>
</html>