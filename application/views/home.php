<div class="container col-xs-9 col-md-offset-1">
	<h1 class="text-center" style="margin-bottom: 40px;">Панель управления</h1>
		<a class="col-md-4 text-center" href="<?php echo URL::base();?>project">
			<div class="col-xs-4">
				<img src="<?php echo URL::base(); ?>public/image/system/project.png">
				<p class="text-center col-xs-12"><h2><small>Проекты</small></h2></p>
			</div>
		</a>
		<a class="col-md-4 text-center" href="<?php echo URL::base();?>topics">
			<div class="col-xs-4">
				<img src="<?php echo URL::base(); ?>public/image/system/topics.png">
				<p class="text-center col-xs-12"><h2><small>Возможные темы</small></h2></p>
			</div>
		</a>
		<a class="col-md-4 text-center" href="<?php echo URL::base();?>manager">
			<div class="col-xs-4">
				<img src="<?php echo URL::base(); ?>public/image/system/manager.png">
				<p class="text-center col-xs-12"><h2><small>Руководители</small></h2></p>
			</div>
		</a>
		<a class="col-md-4 text-center" href="<?php echo URL::base();?>exit">
			<div class="col-xs-4">
				<img src="<?php echo URL::base(); ?>public/image/system/exit.png">
				<p class="text-center col-xs-12"><h2><small>Выход</small></h2></p>
			</div>
		</a>
		<?php 
		if(Auth::instance()->logged_in('admin')) {
			echo "<div class='col-md-12'>string</div>";
		}
		?>
</div>