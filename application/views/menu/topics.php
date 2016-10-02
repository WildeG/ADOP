<p id="error" style="display:none; padding: 10px 20px; margin-left: 10px;" class="bg-danger bg-rounded col-sm-12"></p>
<h1>Возможные темы</h1>
<h2><small>Добавить тему</small></h2>
<div class="container">
	<form class="form-horizontal col-sm-9 col-md-offset-1" id="form_article">
		<div class="form-group" style="padding:0;">
			<label class="col-sm-3 control-label">Формулировка темы</label>
			<div class="col-sm-9" style="padding:0;">
				<input type="text" id="title" class="form-control" placeholder="Формулировка темы" />
			</div>
		</div>
		<div class="form-group" style="padding:0;">
			<label class="col-sm-3 control-label">Описание</label>
			<div class="col-sm-9" style="padding:0;">
				<textarea class="form-control" id="description" placeholder="Описание"></textarea>
			</div>
		</div>
		<div class="form-group" style="padding:0;">
			<label class="col-sm-3 control-label">Вид проекта</label>
			<div class="col-sm-9" style="padding:0;">
				<select id="view" class="form-control">
					<?php
					foreach ($view as $value) {
						echo "<option value='".$value['id_view']."'>".$value['view']."</option>";
					}
					?>
				</select>
			</div>
		</div>
		<div class="form-group text-right">
			<button type="button" onclick="add()" class="btn btn-primary">Добавить тему</button>
		</div>
	</form>
</div>
<h2><small>Список возможных тем для выбора</small></h2>
<div class="container" id="res">
	<table class="table table-striped">
		<thead>
			<th>Заголовок</th>
			<th>Описание</th>
			<th>Вид проекта</th>
			<th>Действия</th>    
		</thead>
		<tbody>
			<?php if(empty($topics)): ?>
			<?php foreach($topics as $item): ?>
			<tr>
				<td valign="bottom"><?php echo $item['title']?></td>
				<td valign="center"><?php echo $item['description']?></td>
				<td valign="center"><?php echo $item['view']?></td>
				<td valign="center"><button onclick="del(<?php echo $item['id_theme']; ?>)" class="delete btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Удалить</button></td>
			</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<td colspan="4"><center>Добавьте тему</center></td>
			<?php endif; ?>
		</tbody>
	</table>
</div>


<script type="text/javascript">
function add() {
	var title = document.getElementById('title').value;
	var description = document.getElementById('description').value;
	var	view = document.getElementById('view').value;
	$.ajax({
		type: "POST",
		url: "/Insert/topics",
		data: {	title:title,
				description:description,
				view:view },
		dataType: "html",
		beforesend: function () {
			$("#res").html("<center><img src='<?php echo URL::base(); ?>public/image/system/load.gif' style='margin:50px;' /></center>");
		},
		success: function(data) {
			$("#res").html(data);
		}
	});
};

function del(id) {
	$.ajax({
		type: "POST",
		url: "/Delete/topics",
		data: {	id:id },
		dataType: "html",
		beforesend: function () {
			$("#res").html("<center><img src='<?php echo URL::base(); ?>public/image/system/load.gif' style='margin:50px;' /></center>");
		},
		success: function(data) {
			$("#res").html(data);
		}
	});
}
</script>