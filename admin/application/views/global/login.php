<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>

<link rel="apple-touch-icon" sizes="57x57" href="<?php echo URL::base(); ?>public/image/system/icon/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo URL::base(); ?>public/image/system/icon/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo URL::base(); ?>public/image/system/icon/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo URL::base(); ?>public/image/system/icon/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo URL::base(); ?>public/image/system/icon/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo URL::base(); ?>public/image/system/icon/apple-touch-icon-120x120.png">
<link rel="icon" type="image/png" href="<?php echo URL::base(); ?>public/image/system/icon/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="<?php echo URL::base(); ?>public/image/system/icon/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="<?php echo URL::base(); ?>public/image/system/icon/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="<?php echo URL::base(); ?>public/image/system/icon/manifest.json">
<meta name="apple-mobile-web-app-title" content="MV53">
<meta name="application-name" content="MV53">
<meta name="msapplication-TileColor" content="#2d89ef">
<meta name="theme-color" content="#ffffff">

<!-- <link href="<?php echo URL::base(); ?>public/css/style.css" rel="stylesheet" type="text/css" /> -->

<?php foreach($styles as $style): ?>
    <link href="<?php echo URL::base(); ?>public/css/<?php echo $style; ?>.css" rel="stylesheet" type="text/css" />
<?php endforeach; ?>

</head>
<body>
<div class="body">
	<div>
		<div class="hat">
			<a href="<?php echo URL::base(); ?>"><div class="title">
				<img class="arms" src="<?php echo URL::base(); ?>public/image/system/gerb.png">
				<img class="maps" src="<?php echo URL::base(); ?>public/image/system/hat-maps.png">
				<h1>Вход</h1>
			</div></a>
		</div>
	</div>
	<div class="content">
		<?php echo $content; ?>
	</div>
	<div class="basement">
		<div class="copyright">
			© 2015 ГОБУЗ "Маловишерская стоматологическая поликлиника"<br>
			<h5>Все материалы, находящиеся на сайте, охраняются в соответствии с законодательством РФ, в том числе, об авторском праве и смежных правах</h5>
		</div>
	</div>
</div>
</body>
</html>