<table class="table table-striped table-bordered table-condensed" border="1px">
	<thead>
		<tr>
			<th>№</th>
			<th>Дата добавления:</th>
			<th>Название проекта:</th>
			<th>Вид проекта:</th>
			<th>Предмет:</th>
			<th>Ф.И.О. автора:</th>
			<th>Группа:</th>
			<th>Действие</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($variable as $value) {
	echo "<tr><td>".($value['id_projects']+1)."</td><td>".HTML::date($value['date_add'])."</td><td>".$value['title']."</td><td>".$value['view']."</td><td>".$value['subject']	."</td><td>".$value['full_name']."</td><td>".$value['group']."</td><td><button class='btn btn-warning btn-xs' style='padding:5px'> <span class='glyphicon glyphicon-pencil'></span></button><button onclick='del(".$value['id_projects'].")' class='delete btn btn-danger btn-xs' style='padding:5px'><span class='glyphicon glyphicon-trash'></span></button></td></tr>";
		} ?>
	</tbody>
</table>