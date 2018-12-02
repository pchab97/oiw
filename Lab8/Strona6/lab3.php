<?php 
    session_start();
    if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)){
        header('Location: zalogowano.php');
        exit();
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
</head>

<body>
    <div class="wrapper">
        <header>
            <div class="log"><img id="logo" src="img/testowy.png" alt="Logo"><strong>Moja strona <span class="www">WWW</span></strong></div>
        </header>
        <nav>
            <div class="navi"><a href="index.html">Laboratorium 1</a></div>
            <div class="navi"><a href="second.html">Laboratorium 2</a></div>
            <div class="navi" style="color: #751B1B;"><a href="lab3.php">Laboratorium 3</a></div>
            <div class="navi"><a href="lab4.html">Laboratorium 4</a></div>
            <div class="navi"><a href="lab5.html">Ulkit</a></div>
            <div style="clear:both"></div>
        </nav>
        <main>
            <div class="logowanie">
                <form action="logowanie.php" method="post">
                    Email: <br /> <input type="text" name="Email" /> <br />
                    Hasło: <br /> <input type="password" name="Haslo" /> <br /><br />
                    <input type="submit" value="Zaloguj się" />
                </form>
                <?php 
                    if(isset($_SESSION['Blad'])) {
                        echo $_SESSION['Blad'];
                    }
                ?>
                            <div>
            <p>Nie masz konta? Załóz je za darmo!</p>
            <a href='rejestracja.php'>Zarejestruj się!</a>
            <br/><br/>
            </div>
            </div>
        </main>
        <footer>
            To jest stopka. &copy; 2018 Wykonał: Przemysław Chabowski 165 IC B2
        </footer>
    </div>
</body>

</html>