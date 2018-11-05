<?php 
session_start();
require_once "connect.php";
if((!isset($_POST['Email'])) || (!isset($_POST['Haslo']))){
    header('Location: lab3.php');
    exit();
}


try{
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    if ($polaczenie->connect_errno!=0){
        throw new Exception(mysqli_connect_errno());
    }
    else{
        $Email = $_POST['Email'];
        $Haslo = $_POST['Haslo'];
        $Email = htmlentities($Email,ENT_QUOTES, "UTF-8");
        $Email = mysqli_real_escape_string($polaczenie, $Email);
        $sql ="SELECT * FROM Uzytkownik where Email='$Email'";
        if($rezultat=@$polaczenie->query($sql))
        {
            $ile=$rezultat->num_rows;
            if($ile>0){
                $row = $rezultat->fetch_assoc();
                if(password_verify($Haslo,$row['Haslo'])){
                    $_SESSION['zalogowany']= true;
                    $_SESSION['ID_Uzytkownika']=$row['ID_Uzytkownika'];
                    $_SESSION['Imie']=$row['Imie'];
                    $_SESSION['Nazwisko']=$row['Nazwisko'];
                    $_SESSION['Email']=$row['Email'];
                    unset($_SESSION['Blad']);
                    $rezultat->free_result();
                    header('Location: zalogowano.php');
                } else{
                    $_SESSION['Blad']='<p style="color: red"> Nieprawidłowe hasło lub login. </p>';
                    header('Location: lab3.php');  
                }
            }
            else{
                $_SESSION['Blad']='<p style="color: red"> Nieprawidłowe hasło lub login. </p>';
                header('Location: lab3.php');
            }
        }
    }
    $polaczenie->close();
}
catch(Excepiotn $e){
    echo '<span style="color: red">Błąd serwera, spróbuj ponownie później.</span>';
}
?>