<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/application/css/style.css">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<title>Учет проектов конструкторского бюро</title>
</head>
<body>
	<div class="main">
		<div class="title">
			<h1>Учет проектов конструкторского бюро</h1>
			<div class="auth">
				<form>
					<input type="text" name="login">
					<input type="text" name="password">
					<input type="submit" value="Вход">
				</form>
			</div>
		</div>
		<div class="menu">
			
		</div>
		<div class="content">
			<table class="project" border="1px">
				<tr>
					<td>Дата добавления:</td>
					<td>Название проекта:</td>
					<td>Предмет:</td>
					<td>Ф.И.О. автора</td>
					<td>Группа:</td>
					<td></td>
				</tr>
				<?php
				$resul = mysql_query("SELECT * FROM projects INNER JOIN user ON projects.id_user = user.id_user INNER JOIN view ON projects.id_vid = view.id_view",$db);
				$array = mysql_fetch_array($resul);
				do
					{
				echo "<tr><td>".$array['titles']."</td><td>".$array['titles']."</td><td>".$array['name']."</td><td>".$array['titles']."</td></tr>";
				}
				while($array = mysql_fetch_array($resul));
				?>
			</table>
			<div class="pages">
				
			</div>
		</div>
	</div>
</body>
</html>