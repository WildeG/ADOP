


<div class="form-group">
	<div class="col-xs-11">
		<input type="text" class="form-control" id="search" name="search" placeholder="Название проекта">
	</div>
	<input type="button" class="btn btn-info" onclick="search()" value="Поиск">
	<a onclick="$('#one').slideToggle('slow');" href="javascript://"><span class="glyphicon glyphicon-triangle-bottom"></span></a>
</div>

<div class="container col-xs-9 col-md-offset-1" id="one" style="display: none; margin-bottom: 60px;">
	<div class="form-group">
		<div class="col-xs-4">
			<label class="control-label">Фамилия:</label>
			<input type="text" class="form-control" id="family" name="family" placeholder="Фамилия">
		</div>
		<div class="col-xs-4">
			<label class="control-label">Имя:</label>
			<input type="text" class="form-control" id="name" name="name" placeholder="Имя">
		</div>
		<div class="col-xs-4">
			<label class="control-label">Отчество:</label>
			<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Отчество">
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-4">
			<label class="control-label">Специальность:</label>
			<select name="spec" class="form-control">
				<option>-Все специальности-</option>
				<?php 
				foreach ($specialty as $value) {
					echo "<option value='".$value['cipher']."'>".$value['title_spec']."</option>";
				}
				?>
			</select>
		</div>
		<div class="col-xs-4">
			<label class="control-label">Группа:</label>
			<select name="group" class="form-control">
				<option>-Все группы-</option>
				<?php 
				foreach ($group as $value) {
					echo "<option value='".$value['id_group']."'>".$value['group']."</option>";
				}
				?>
			</select>
		</div>
		<div class="col-xs-4">
			<label class="control-label">Вид проекта:</label>
			<select name="view" class="form-control">
				<option>-Все виды-</option>
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
			<select name="manager" class="form-control">
				<option>-Все руководители-</option>
				<?php 
				foreach ($manager as $value) {
					echo "<option value='".$value['id_manager']."'>".$value['full_name']."</option>";
				}
				?>
			</select>
		</div>
		<div class="col-xs-4">
			<label class="control-label">Дата добавления: с</label>
			<input type="date" class="form-control" name="sdate">
		</div>
		<div class="col-xs-4">
			<label class="control-label">по</label>
			<input type="date" class="form-control" name="podate">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-3 col-md-offset-8">Сортировать по:</label>
		<div class="col-xs-4 col-md-offset-8">
			<select class="form-control" name="sort">
				<option>Номер</option>
				<option>Дата добавления</option>
				<option>ФИО</option>
				<option>Предмет</option>
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
	$.ajax({
		type: "POST",
		url: "/Insert/filter",
		data: {search:search},
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