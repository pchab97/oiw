<?php
function wyswOgl(){        
    require_once "connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);
    try{
        $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
        if ($polaczenie->connect_errno!=0){
            throw new Exception(mysqli_connect_errno());
        }
        else {
            $sql ="SELECT Tytul, Tresc, Kategoria, Imie, Nazwisko FROM Ogloszenia, Uzytkownik WHERE Uzytkownik.ID_Uzytkownika=Ogloszenia.ID_Uzytkownika ";
            if ($rezultat=@$polaczenie->query($sql)) {
                while ($row = mysqli_fetch_array($rezultat)) {
                    echo	
                    '<div class="ogloszenie"> <p class="Tytul"><b>'.$row['Tytul'].'</b></p>
                    <p class"tresc">'.$row['Tresc'].'</p>
                    <p class="kategoria>'.$row['Kategoria'].'</p> 
                    <p class="autor">Autor: '.$row['Imie'].' '.$row['Nazwisko'].'</p></div><br/><br/>';
                }
            }
        }
        $polaczenie->close();
    }
    catch(Exception $e){
        echo "Błąd serwera";
    }
}
function dodaj(){

}
?>
