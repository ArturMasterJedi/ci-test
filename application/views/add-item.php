<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Добавление в базу</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<form method="post" enctype="multipart/form-data" action="<?php echo base_url();?>AddController/photoUpload" style="width: 50%">
	<?php
	if ($this->uri->segment(2) == "inserted"){
		echo "<p class='text-success'>Данные добавлены</p>";
	}
	?>
	<div class="form-group">
		<label>Введите название</label>
		<input type="text" name="name" class="form-control" />
		<span class="text-danger"><?php echo form_error('name'); ?></span>
	</div>
	<div class="form-group">
		<label>Введите описание</label>
		<textarea name="fulldescription" class="form-control"></textarea>
		<span class="text-danger"><?php echo form_error('fulldescription'); ?></span>
	</div>
	<div class="form-group">
		<label>Добавить фото</label>
		<input name="photo" type="file" class="form-control">
		<span class="text-danger"><?php echo form_error('photo'); ?></span>
	</div>
	<div class="form-group">
		<input type="submit" name="send" value="Добавить" class="btn btn-success">
	</div>
</form>

<div style="width: 300px">
	<table class="fa-table" border="1" style="width: 300px">
		<tr>
			<th>ID</th>
			<th>Имя</th>
			<th>Описание</th>
		</tr>
		<?php
			foreach ($fetch_data->result() as $tmp){
				echo '<tr>';
					echo '<td>'.$tmp->id.'</td>';
					echo '<td>'.$tmp->name.'</td>';
					echo '<td>'.$tmp->fulldescription.'</td>';
				echo '</tr>';
			}
		?>

	</table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
