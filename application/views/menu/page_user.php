<div class="alert alert-danger col-sm-12" id="error" style="display:none;"></div>
<h1>Личный кабинет</h1>
<div class="container">
	<h2 class="modal-title"><small>Карточка пользователя</small><br> <?php echo $user['0']['full_name']; ?></h2>
	<p>
		<table style="width: 100%">
			<tr>
				<td>Группа: <?php echo $user['0']['group']; ?></td>
				<td>&nbsp&nbsp</td>
				<td>Специальность: <?php echo $user['0']['title_spec']; ?></td>
			</tr>
			<tr>
				<td>E-mail:<?php echo $user['0']['e-mail']; ?></td>
				<td>&nbsp&nbsp</td>
				<td>Дата поступления:<?php echo $user['0']['date_receipt']; ?></td>
			</tr>
		</table>
	</p>
<a href="/reg_project"><button type="button" class="btn btn-success" style="float:right; margin: 10px;">Добавить проект</button></a>
<h2><small>Проекты пользователя</small></h2>
<table class="table table-striped table-bordered table-condensed">
	<thead>
		<tr>
			<th>Заголовок</th>
			<th>Вид проекта</th>
			<th>Прогресс</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		foreach ($project as $value) {
		 	echo "<tr><td>".$value['title']."</td><td>".$value['view']."</td><td>".$value['document']."</td></tr>";
		 } ?>
	</tbody>
</table>
</div>