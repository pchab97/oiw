
<?php
//    session_start();
/*	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: lab3.php');
		exit();
	}*/
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
            <div class="navi" style="color: #751B1B; text-decoration: underline;">Laboratorium 3</div>
            <div class="navi">zakładka4</div>
            <div class="navi">zakładka5</div>
            <div style="clear:both"></div>
        </nav>
        <main>
            <div class="Ogloszenia">
            <div class="wypisanie">
                <div class=php style="color :black"> <?php wyswOgl(); ?> 
            </div>
            </div>
                <div class="dodawanie">
                </div>
                <div style="clear:both"></div>
            </div> 

        </main>
        <footer>
            To jest stopka. &copy; 2018 Wykonał: Przemysław Chabowski 165 IC B2
        </footer>
    </div>
</body>

</html>