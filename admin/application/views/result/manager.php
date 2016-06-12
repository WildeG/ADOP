<table class="table table-striped">
	<thead>
		<th>ФИО руководители</th>
		<th>Количество курируемых проектов</th>
		<th>Действия</th>
	</thead>
	<tbody>
		<?php if($mang): ?>
		<?php foreach($mang as $item): ?>
		<tr>
			<td valign="center"><?php echo $item['full_name']?></td>
			<td valign="center">
				<?php if (isset($item['count'])) { echo $item['count']; } else { echo "0"; } ?>
			</td> 
			<td valign="center"><button class="btn btn-warning btn-xs">
					<span class="glyphicon glyphicon-pencil"></span> Изменить
					</button><button onclick="del(<?php echo $item['id_manager']; ?>)" class="delete btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span>Удалить</button>
			</td>
		</tr>
		<?php endforeach; ?>
		<?php else: ?>
			<td colspan="4"><center>Добавьте руководителя</center></td>
		<?php endif; ?>
	</tbody>
</table>