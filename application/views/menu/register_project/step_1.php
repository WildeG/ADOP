<form class="form-horizontal">
	<div class="container col-xs-8 col-md-offset-2">
		<div class="form-group">
			<label for="exampleInputFile">Заголовок:</label>
			<input class="form-control" type="text" id="exampleInputFile">
		</div>
		<div class="form-group">
			<label for="inputEmail" class="control-label">Описание:</label>
			<textarea class="form-control" rows="3"></textarea>
		</div>
		<div class="form-group">
			<label for="inputEmail" class="control-label">Руководитель:</label>
			<select class="form-control">
				<option></option>
			</select>
		</div>
		<div class="form-group">
			<label for="inputEmail" class="control-label">Вид проекта:</label>
			<select class="form-control">
				<option></option>
			</select>
		</div>
		<div class="form-group">
			<label for="exampleInputFile">Выберите файл:</label>
			<input type="file" id="btn btn-info" class="btn btn-default">
		</div>
		<div class="form-group">
			<div class="col-xs-offset-4 col-xs-5">
				<input type="submit" class="btn btn-primary" value="Добавить проект">
				<input type="reset" class="btn btn-default" value="Очистить форму">
			</div>
		</div>
	</div>
</form>
<script>
$(document).on('ready', function() {
    $("#file").fileinput({showCaption: false});
});
</script>