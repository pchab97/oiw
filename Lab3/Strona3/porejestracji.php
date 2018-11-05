<?php 
    session_start();
    if((!isset($_SESSION['udanarej']))){
        header('Location: rejestracja.php');
        exit();
    }
    else{
        unset($_SESSION['udanarej']);
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
    <?php include("funkcje.php");?>
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
            <div class="navi">zakładka4</div>
            <div class="navi">zakładka5</div>
            <div style="clear:both"></div>
        </nav>
        <main>
            <div style="text-align: center; margin-top: 100px; margin-bottom: 100px"> 
                <p> Rejestracja przebiegła pomyślnie ;)</p>
                <p> Aby korzystać z serwisu zaloguj się.</p>
                <a href="lab3.php">ZALOGUJ SIĘ</a>
            </div>
        </main>
        <footer>
            To jest stopka. &copy; 2018 Wykonał: Przemysław Chabowski 165 IC B2
        </footer>
    </div>
</body>

</html>