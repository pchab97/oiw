<?php 
    session_start();
    if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)){
        header('Location: zalogowano.php');
        exit();
    }
    if(isset($_POST['Imie'])){
        $OK=true;
        $imie = $_POST['Imie'];
        $nazwisko = $_POST['Nazwisko'];
        $email = $_POST['Email'];
        $emaill = filter_var($email, FILTER_SANITIZE_EMAIL);
        $haslo1 = $_POST['Password'];
        $haslo2 = $_POST['Password2'];
        $haslo1_hash = password_hash($haslo1, PASSWORD_DEFAULT);
        $secretRecaptcha = "6LcESXgUAAAAAIZ-6taLdSlyOz3BxSWXw4SAzNPb";
        $responseRecaptcha = $_POST['g-recaptcha-response'];
        $userIP = $_SERVER['REMOTE_ADDR'];
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=".$secretRecaptcha."&response=".$responseRecaptcha."&remoteip=".$userIP;
        $response = file_get_contents($url);
        $response = json_decode($response);

        
        if((strlen($imie)>30) || (strlen($imie)<3)){
                $OK=false;
                $_SESSION['e_imie']="Imie musi posiadać od 3 do 30 znaków.";
        }
        if(!ctype_alpha($imie)){
            $OK=false;
            $_SESSION['e_imie']="Imie musi składać się tylko z liter i bez polskich znaków";
        }
        if((strlen($nazwisko)>40) || (strlen($nazwisko)<3)){
            $OK=false;
            $_SESSION['e_nazwisko']="Nazwisko musi posiadać od 3 do 40 znaków.";
        }
        if(!ctype_alpha($nazwisko)){
            $OK=false;
            $_SESSION['e_imie']="Imie musi składać się tylko z liter i bez polskich znaków";
        }
        if ((filter_var($emaill, FILTER_VALIDATE_EMAIL)==false) || ($email!=$emaill)) {
            $OK=false;
            $_SESSION['e_email']="Podaj prawidlowy adres email";
        }
        if($haslo1!=$haslo2){
            $_SESSION['e_haslo']="Podane hasła są rózne";
        }
        if ((strlen($haslo1)<8 || (strlen($haslo2)>20))) {
            $OK=false;
            $_SESSION['e_haslo']="Haslo powinno miec od 8 do 20 znaków.";
        }
        if (!isset($_POST['regulamin'])) {
            $OK=false;
            $_SESSION['e_regulamin']="Musisz zaakceptować regulamin.";
        }
        if(!($response->success)){
            $OK=false;
            $_SESSION['e_recaptcha']="Musisz udowodnić, ze nie jesteś botem.";
        }
        require_once "connect.php";
        mysqli_report(MYSQLI_REPORT_STRICT);
        try{
            $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
            if ($polaczenie->connect_errno!=0){
                throw new Exception(mysqli_connect_errno());
            }
            else {
                $sql ="SELECT * FROM Uzytkownik where Email='$emaill'";
                if ($rezultat=@$polaczenie->query($sql)) {
                    $ile=$rezultat->num_rows;
                    if ($ile>0) {
                        $OK=false;
                        $_SESSION['e_email']="Podany email juz istnieje.";
                    } 
                }
            }
            if($OK==true){
                if($polaczenie->query("INSERT INTO Uzytkownik VALUES (null,'$imie','$nazwisko','$email','$haslo1_hash')")){
                    $_SESSION['udanarej']=true;
                    header('Location: porejestracji.php');
                }
                else{
                    throw new Exception($polaczenie->error);
                }
            }
            $polaczenie->close();
        }
        catch(Exception $e){
            echo '<span style="color: red">Błąd serwera, spróbuj ponownie później.</span>';
            //echo $e;
        }
    }
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laboratorium 3</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fontello.css">
    <script src="js/script.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    
</head>

<body>
    <div class="wrapper">
        <header>
            <div class="log"><img id="logo" src="img/testowy.png" alt="Logo"><strong>Moja strona <span class="www">WWW</span></strong></div>
        </header>
        <nav>
            <div class="navi"><a href="index.html">Laboratorium 1</a></div>
            <div class="navi"><a href="second.html">Laboratorium 2</a></div>
            <div class="navi" style="color: #751B1B; text-decoration: underline;"><a href="lab3.php">Laboratorium 3</a></div>
            <div class="navi"><a href="lab4.html">Laboratorium 4</a></div>
            <div class="navi">zakładka5</div>
            <div style="clear:both"></div>
        </nav>
        <main>
            <div class="rejestracja">
                <form method="POST">
                    Imię: <br/> <input type="text" name="Imie"/> <br/>
                    <?php 
                    if(isset($_SESSION['e_imie'])){
                        echo '<div class="e">'.$_SESSION['e_imie'].'</div>';
                        unset($_SESSION['e_imie']);
                    }
                    ?>
                    Nazwisko: <br/> <input type="text" name="Nazwisko" /> <br/>
                    <?php 
                    if(isset($_SESSION['e_nazwisko'])){
                        echo '<div class="e">'.$_SESSION['e_nazwisko'].'</div>';
                        unset($_SESSION['e_nazwisko']);
                    }
                    ?>
                    Email: <br/> <input type="text" name="Email" /> <br/>
                    <?php
                    if(isset($_SESSION['e_email'])){
                        echo '<div class="e">'.$_SESSION['e_email'].'</div>';
                        unset($_SESSION['e_email']);
                    }
                    ?>
                    Haslo: <br/> <input type="password" name="Password" /> <br/>
                    <?php 
                    if(isset($_SESSION['e_haslo'])){
                        echo '<div class="e">'.$_SESSION['e_haslo'].'</div>';
                        unset($_SESSION['e_haslo']);
                    }
                    ?>
                    Powtórz hasło <br/> <input type="password" name="Password2" /> <br/>
                    <label>
                        <input type="checkbox" name="regulamin"> Akceptuję regulamin
                    </label>
                    <?php 
                    if (isset($_SESSION['e_regulamin'])) {
                        echo '<div class="e">'.$_SESSION['e_regulamin'].'</div>';
                        unset($_SESSION['e_regulamin']);
                    }
                    ?>
                    <div class="g-recaptcha" data-sitekey="6LcESXgUAAAAAB_747SuuDWZ-nXo7wHjKlP_6cTl"></div> 
                    <?php
                    if (isset($_SESSION['e_recaptcha'])) {
                        echo '<div class="e">'.$_SESSION['e_recaptcha'].'</div>';
                        unset($_SESSION['e_recaptcha']);
                    }
                    ?>
                    <br/>
                    <input type="submit" value="Zarejestruj">
                </form>
            </div>
        </main>
        <footer>
            To jest stopka. &copy; 2018 Wykonał: Przemysław Chabowski 165 IC B2
        </footer>
    </div>
</body>

</html>