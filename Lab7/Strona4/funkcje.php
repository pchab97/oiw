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
            $sql ="SELECT Imie, Nazwisko, Kategoria, Tresc, Tytul FROM oiw.Ogloszenia INNER JOIN oiw.Uzytkownik ON Ogloszenia.ID_Uzytkownika=Uzytkownik.ID_Uzytkownika GROUP BY Ogloszenia.Kategoria";
            if ($rezultat=@$polaczenie->query($sql)) {
                while ($row = mysqli_fetch_array($rezultat)) {
                    echo	
                    '<div class="ogloszenie"> <p class="Tytul"><b>'.$row['Tytul'].'</b></p>
                    <p class"tresc">'.$row['Tresc'].'</p>
                    <p class="kategoria>'.$row['Kategoria'].'</p> 
                    <p class="autor">Autor: '.$row['Imie'].' '.$row['Nazwisko'].'</p></div><br/><br/>';
                }
            }
            echo "<br/><br/><h2> Twoje ogłoszenia:</h2><br/>";
            $sql2 ="SELECT Imie, Nazwisko, Kategoria, Tresc, Tytul FROM oiw.Ogloszenia INNER JOIN oiw.Uzytkownik ON Ogloszenia.ID_Uzytkownika=Uzytkownik.ID_Uzytkownika WHERE Ogloszenia.ID_Uzytkownika=".$_SESSION['ID_Uzytkownika']." GROUP BY Ogloszenia.Kategoria";
            if ($rezultat2=@$polaczenie->query($sql2)) {
                while ($row2 = mysqli_fetch_array($rezultat2)) {
                    echo	
                    '<div class="ogloszenie"> <p class="Tytul"><b>'.$row2['Tytul'].'</b></p>
                    <p class"tresc">'.$row2['Tresc'].'</p>
                    <p class="kategoria>'.$row2['Kategoria'].'</p> 
                    <p class="autor">Autor: '.$row2['Imie'].' '.$row2['Nazwisko'].'</p></div><br/><br/>';
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
