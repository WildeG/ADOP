<div>
	<form>
		<?php 
		$title_spec = "cucu";
		if (isset($_GET['cipher'])) {
			echo "<h4>Заменить:</h4><input type='text' name='cipher' value='".$_GET['cipher']."' disabled><input type='text' name='title_spec' value='".$title_spec."' disabled><h4>На:</h4>";
		} ?>
		<input type="text" name="cipher">
		<input type='text' name='title_spec'>
		<input type="submit" value="Внести данные">
	</form>
</div>
