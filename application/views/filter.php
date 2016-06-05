<table class="table table-striped table-bordered table-condensed" border="1px">
	<thead>
		<tr>
			<td>№</td>
			<td>Дата добавления:</td>
			<td>Название проекта:</td>
			<td>Вид проекта:</td>
			<td>Предмет:</td>
			<td>Ф.И.О. автора:</td>
			<td>Группа:</td>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($variable as $value) {
	echo "<tr><td>".($value['id_projects']+1)."</td><td>".HTML::date($value['date_add'])."</td><td>".$value['title']."</td><td>".$value['view']."</td><td>".$value['subject']	."</td><td>".$value['family']."&nbsp".$value['name']."&nbsp".$value['last name']."</td><td>".$value['group']."</td></tr>";
		} ?>
	</tbody>
</table>