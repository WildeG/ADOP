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
				<input type="button" onclick="add()" class="btn btn-primary" value="Зарегестрировать пользователя">
			</div>
		</div>
	</form>
</div>