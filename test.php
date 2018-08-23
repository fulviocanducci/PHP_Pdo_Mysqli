<?php

	include 'db.php';

	$db = new database();

	if (($description = filter_input(INPUT_POST, 'description')))
	{
		$args = array(
			':description' => $description, 
			':status' => (filter_input(INPUT_POST, 'status') ? 1 : 0)
		);
		$stmt = $db->prepareSql('INSERT INTO note(description,status) VALUES(:description, :status)', $args);
		$stmt->execute();
		header('location: test.php');		
		die();
	} 
	else 
	{ 
		$stmt = $db->prepareSql('SELECT * FROM "note"');
		$stmt->execute();
		$listNote = $stmt->fetchAll(PDO::FETCH_CLASS);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Pagina de requisição</title>
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<p>
			<label for="description">Digite o nome:</label>
			<input type="text" id="description" name="description" required autofocus />
		</p>
		<p>
			<label for="status">Status:</label>
			<input type="checkbox" id="status" name="status" />
		</p>
		<div>
			<button type="submit">Enviar</button>
		</div>
	</form>
	<table>
		<tr>
			<td>Id</td>
			<td>Descrição</td>
			<td>Status</td>
		</tr>
		<?php foreach ($listNote as $note): ?>
		<tr>
			<td><?php echo $note->id; ?></td>
			<td><?php echo $note->description; ?></td>
			<td><?php echo $note->status ? 'true': 'false'; ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
</body>
</html>

<?php } ?>