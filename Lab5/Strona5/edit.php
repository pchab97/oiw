<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'oiw');

	$tytul = "";
	$kategoria = "";
	$tresc = "";
	$ID_Ogloszenia = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$tytul = $_POST['tytul'];
		$kategoria = $_POST['kategoria'];
		$tresc = $_POST['tresc'];

		mysqli_query($db, "INSERT INTO Ogloszenia (ID_Ogloszenia, ID_Uzytkownika, Kategoria, Tytul, Tresc) VALUES (null, 1, '$kategoria', '$tytul', '$tresc')"); 
		$_SESSION['message'] = "Dodano pomyślnie!"; 
		header('location: Zalogowano.php');
	}


	if (isset($_POST['update'])) {
		$ID_Ogloszenia = $_POST['ID_Ogloszenia'];
		$tytul = $_POST['tytul'];
		$kategoria = $_POST['kategoria'];
		$tresc = $_POST['tresc'];

		mysqli_query($db, "UPDATE Ogloszenia SET ID_Ogloszenia=null, ID_Uzytkownika=1, Kategoria='$kategoria', Tytul='$tytul', Tresc='$tresc' WHERE ID_Ogloszenia=$ID_Ogloszenia");
		$_SESSION['message'] = "Zaktualizowano pomyślnie!"; 
		header('location: Zalogowano.php');
	}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM Ogloszenia WHERE ID_Ogloszenia=$ID_Ogloszenia");
	$_SESSION['message'] = "Address deleted!"; 
	header('location: Zalogowano.php');
}


	$results = mysqli_query($db, "SELECT * FROM Ogloszenia");


?>