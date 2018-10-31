<?php
//session_start();
/*if ((!isset($_POST['Email'])) || (!isset($_POST['Haslo'])))
{
    header('Location: lab3.php');
    exit();
}
require_once "connect.php";

$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$login = $_POST['Email'];
		$haslo = $_POST['Haslo'];
		
	//	$login = htmlentities($login, ENT_QUOTES, "UTF-8");
	//	$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
	
		if ($rezultat = @$polaczenie->query(
		sprintf("SELECT * FROM Uzytkownik WHERE Email='%s' AND Haslo='%s'",
		mysqli_real_escape_string($polaczenie,$login),
		mysqli_real_escape_string($polaczenie,$haslo))))
		{
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
				$_SESSION['zalogowany'] = true;
				
				$wiersz = $rezultat->fetch_assoc();
				$_SESSION['ID_Uzytkownika'] = $wiersz['ID_Uzytkownika'];
				$_SESSION['Imie'] = $wiersz['Imie'];
				$_SESSION['Nazwisko'] = $wiersz['Nazwisko'];
				$_SESSION['Email'] = $wiersz['Email'];
				$_SESSION['Haslo'] = $wiersz['Haslo'];
				
				unset($_SESSION['blad']);
				$rezultat->free_result();
				header('Location: zalogowano.php');
				
			} else {
				
			//	$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: lab3.php');
				
			}
			
		}
		
		$polaczenie->close();
    }
 */   
function wyswOgl(){
$link = mysqli_connect("localhost", "root", "")
    or die("Could not connect"); 
mysqli_select_db($link, "oiw")
    or die("Could not select database"); 	                                     
mysqli_query($link, "SET NAMES utf8");
$query  = "SELECT * FROM Ogloszenia";      
$result = mysqli_query($link, $query)  
    or die("Error");
while ($row = mysqli_fetch_array($result)) {
    echo	
	"<b><TR>ID_Oglosznia:&nbsp&nbsp". $row["ID_Ogloszenia"]."</b><br/>".
	"<b><TR>ID_Uzytkownika:&nbsp&nbsp". $row["ID_Uzytkownika"]."</b><br/>".
    "<b><TR>Kategoria:&nbsp&nbsp". $row["Kategoria"]."</b><br/>".
    "<b><TR>". $row["Tresc"]."</b><br/>".
    "</TR><TR></TR>\n<br/>";	    
    }
mysqli_free_result($result);   
mysqli_close($link);
}
function dodaj(){
	if (isset($_POST["submit"])) {
	if ($nick != null && $password !=null)
		{
			$zapytanie = "INSERT INTO Ogloszenia ( Nick,`Email`,`Tekst`) ";
        	$zapytanie .= "VALUES ( '$Nick','$Email', '$Tekst')";
			mysqli_query($link, $zapytanie);			
		}	
			
    }
}
?>
