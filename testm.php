<?php
	
	function getMysqli() 
	{
		$db = mysqli_connect("127.0.0.1", "root", "senha", "my_db");
		mysqli_set_charset($db,'utf8');
		return $db;
	}
	
	$db = getMysqli();

	if (($description = filter_input(INPUT_POST, 'description')))
	{
		$stmt = mysqli_prepare($db,'INSERT INTO note(description,status) VALUES(?,?)');				
		$status = (filter_input(INPUT_POST, 'status') ? 1 : 0);
		mysqli_stmt_bind_param($stmt,'si', $description, $status);
		mysqli_stmt_execute($stmt);		
		header('location: testm.php');		

		die();
	} 
	else 
	{ 				
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Pagina de requisição</title>
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<p>
			<label for="description">Digite o nome:</label>
			<input type="text" id="description" name="description" required autofocus autocomplete="off"/>
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
		<?php $result = mysqli_prepare($db, 'SELECT * FROM note'); ?>
		<?php mysqli_stmt_execute($result); ?>
		<?php $items = mysqli_stmt_get_result($result); ?>
		<?php while ($result && $note = mysqli_fetch_assoc($items)): ?>
		<tr>
			<td><?php echo $note['id']; ?></td>
			<td><?php echo $note['description']; ?></td>
			<td><?php echo $note['status'] ? 'true': 'false'; ?></td>
		</tr>
		<?php endwhile; ?>
	</table>
</body>
</html>

<?php } ?>