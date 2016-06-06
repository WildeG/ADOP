<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h2 class="modal-title"><small>Карточка пользователя</small><br> <?php echo $user['0']['full_name']; ?></h2>
</div>
<div class="modal-body">
<h4><?php echo $user['0']['full_name']; ?></h4>
<p>
	<table>
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
<h4>Проекты пользователя</h4>
<table class="table table-striped table-bordered table-condensed">
	<thead>
		<tr>
			<th>Заголовок</th>
			<th>Вид проекта</th>
			<th>Документ <span class="glyphicon glyphicon-floppy-save"></span></th>
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
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
</div>