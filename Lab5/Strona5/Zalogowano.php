<?php 
include('edit.php');
	if (isset($_GET['edit'])) {
		$ID_Ogloszenia = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM Ogloszenia WHERE ID_Ogloszenia=$ID_Ogloszenia");

		//if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$tytul = $n['Tytul'];
			$kategoria = $n['Kategoria'];
			$tresc = $n['Tresc'];
		//}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lab 5</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>

<?php $results = mysqli_query($db, "SELECT * FROM Ogloszenia"); ?>
<form method="post" action="edit.php" >

	<input type="hidden" name="ID_Ogloszenia" value="<?php echo $ID_Ogloszenia; ?>">

	<div class="input-group">
		<label>Tytul</label>
		<input type="text" name="tytul" value="<?php echo $tytul; ?>">
	</div>
	<div class="input-group">
		<label>Kategoria</label>
		<input type="text" name="kategoria" value="<?php echo $kategoria; ?>">
	</div>
	<div class="input-group">
		<label>Tresc</label>
		<input type="text" name="tresc" value="<?php echo $tresc; ?>">
	</div>
	<div class="input-group">

		<?php if ($update == true): ?>
			<button class="btn" type="submit" name="update" style="background: #556B2F;" >Aktualizuj</button>
		<?php else: ?>
			<button class="btn" type="submit" name="save" >Dodaj</button>
		<?php endif ?>
	</div>
</form>
<table>
	<thead>
		<tr>
			<th>Tytuł</th>
			<th>Kategoria</th>
			<th>Treść</th>
			<th colspan="2"></th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['Tytul']; ?></td>
			<td><?php echo $row['Kategoria']; ?></td>
			<td><?php echo $row['Tresc']; ?></td>
			<td>
				<a href="Zalogowano.php?edit=<?php echo $row['ID_Ogloszenia']; ?>" class="edit_btn" >Edytuj</a>
			</td>
			<td>
				<a href="edit.php?del=<?php echo $row['ID_Ogloszenia']; ?>" class="del_btn">Usuń</a>
			</td>
		</tr>
	<?php } ?>
</table>
</body>
</html>