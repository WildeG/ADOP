<table class="table table-striped">
	<thead>
		<th>Заголовок</th>
		<th>Описание</th>
		<th>Вид проекта</th>
		<th>Действия</th>    
	</thead>
	<tbody>
		<?php if(!empty($topics)): ?>
		<?php foreach($topics as $item): ?>
		<tr>
			<td valign="bottom"><?php echo $item['title']?></td>
			<td valign="center"><?php echo $item['description']?></td>
			<td valign="center"><?php echo $item['view']?></td>
				<td valign="center"><button onclick="del(<?php echo $item['id_theme']; ?>)" class="delete btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span>Удалить</button></td>
		</tr>
		<?php endforeach; ?>
		<?php else: ?>
			<td colspan="4"><center>Добавьте тему</center></td>
		<?php endif; ?>
	</tbody>
</table>