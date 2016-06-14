<div class="form-group">
	<div class="col-xs-11">
		<input type="text" class="form-control" id="search" name="search" placeholder="Название проекта">
	</div>
	<input type="button" class="btn btn-info" onclick="search()" value="Поиск">
	<a onclick="$('#one').slideToggle('slow');" href="javascript://"><span class="glyphicon glyphicon-triangle-bottom"></span></a>
</div>

<div class="container col-xs-9 col-md-offset-1" id="one" style="display: none; margin-bottom: 60px;">
	<div class="form-group">
		<div class="col-xs-12">
			<label class="control-label">Полное имя</label>
			<input type="text" class="form-control" id="full_name" name="full_name" placeholder="Фамилия">
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-4">
			<label class="control-label">Специальность:</label>
			<select name="specialty" id="spec" class="form-control">
				<option value="false" name="spec">-Все специальности-</option>
				<?php 
				foreach ($specialty as $value) {
					echo "<option value='".$value['cipher']."'>".$value['title_spec']."</option>";
				}
				?>
			</select>
		</div>
		<div class="col-xs-4">
			<label class="control-label">Группа:</label>
			<select name="group" id="group" class="form-control">
				<option value="false" name="group">-Все группы-</option>
				<?php 
				foreach ($group as $value) {
					echo "<option value='".$value['id_group']."'>".$value['group']."</option>";
				}
				?>
			</select>
		</div>
		<div class="col-xs-4">
			<label class="control-label">Вид проекта:</label>
			<select name="view" id="view" class="form-control">
				<option value="false" name="view">-Все виды-</option>
				<?php 
				foreach ($view as $value) {
					echo "<option value='".$value['id_view']."'>".$value['view']."</option>";
				}
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-4">
			<label class="control-label">Руководитель:</label>
			<select name="manager" id="manager" class="form-control">
				<option value="false" name="manager">-Все руководители-</option>
				<?php
				foreach ($manager as $value) {
					echo "<option value='".$value['id_manager']."'>".$value['full_name']."</option>";
				}
				?>
			</select>
		</div>
		<div class="col-xs-4">
			<label class="control-label">Дата добавления: с</label>
			<input type="date" class="form-control" name="sdate" id="sdate">
		</div>
		<div class="col-xs-4">
			<label class="control-label">по</label>
			<input type="date" class="form-control" name="podate" id="podate">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-3 col-md-offset-8">Сортировать по:</label>
		<div class="col-xs-4 col-md-offset-8">
			<select class="form-control" name="sort" id="sort">
				<option value='Nomer'>Номер</option>
				<option value='data_add'>Дата добавления</option>
				<option value='FIO'>ФИО</option>
				<option value='Subject'>Предмет</option>
			</select>
		</div>
	</div>
</div>
<div id="res">
<?php echo $res; ?>
</div>
<script type="text/javascript">
function search() {
	var search = document.getElementById('search').value;
	var full_name = document.getElementById('full_name').value;
	var spec = document.getElementById('spec').value;
	var group = document.getElementById('group').value;
	var view = document.getElementById('view').value;
	var manager = document.getElementById('manager').value;
	var sdate = document.getElementById('sdate').value;
	var podate = document.getElementById('podate').value;
	var sort = document.getElementById('sort').value;
	$.ajax({
		type: "POST",
		url: "/Select/filter",
		data: {	search:search,
				full_name:full_name,
				spec:spec,
				group:group,
				view:view,
				manager:manager,
				sdate:sdate,
				podate:podate,
				sort:sort
				},
		dataType: "html",
		success: function(data) { // когда получаем ответ
			// if(!data.error){ // Если ошибки нет, то удаляем строку
				$("#res").html(data);
			// }else{ // Если сервер вернул ошибку то выводим текст ошибки
			// 	$("#res").html(data.message).slideDown();
			// }
		}
	});
}
</script>