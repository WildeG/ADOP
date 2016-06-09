<div class="alert alert-danger col-sm-12" id="error" style="display:none;"></div>
<h1>Проекты</h1>
<h2><small>Добавить проект</small></h2>
<div class="container">
	<form class="form-horizontal" role="form" method="POST" id="form_article">
		<input type="text" class="form-control" id="title" placeholder="Название проекта" style="margin-bottom: 15px;">
		<textarea id="discriptions" class="form-control" placeholder="Описание" style="margin-bottom: 15px;"></textarea>
		<div class="form-group" style="padding:0;">
			<div class="col-sm-6">
				<input type="text" class="form-control" id="subject" placeholder="Предмет">
			</div>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="user" placeholder="Пользователь">
			</div>
		</div>
		<div class="form-group" style="padding:0;">
			<div class="col-sm-4">
				<select class="form-control" id="manager">
					<?php 
					foreach ($manager as $value) {
						echo "<option value='".$value['id_manager']."' >".$value['full_name']."</option>";
					}
					?>
				</select>
			</div>
			<div class="col-sm-4">
				<select class="form-control" id="view">
					<?php 
					foreach ($view as $value) {
						echo "<option value='".$value['id_view']."' >".$value['view']."</option>";
					}
					?>
				</select>
			</div>
			<div class="col-sm-4">
				<input type="file" class="form-control" id="document">
			</div>
		</div>
		<div class="form-group text-right" style="padding:0 15px;">
			<div class="btn-group">
				<input type="reset" class="btn btn-default" value="Очистить форму">
				<input type="button" onclick="add()" class="btn btn-primary" value="Добавить проект">
			</div>
		</div>
	</form>
</div>
<h2><small>Текущие проекты</small></h2>
<div class="container">
	<div class="form-group">
		<div class="input-group col-sm-12" style="padding:0;">
			<input type="text" class="form-control" id="search" placeholder="Поиск">
			<span class="input-group-btn">
      			<button class="btn btn-primary" id="search_b" onclick="search('all')" type="button">Поиск</button>
     		</span>
		</div>
		<div class="form-group col-sm-12 text-right" style="padding:0;">
			<a onclick="$('#one').slideToggle('slow');" href="javascript://">Фильтр<span class="caret"></span></a>
		</div>
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