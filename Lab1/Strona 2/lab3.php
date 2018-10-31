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
        <div class="navi" style="color: #751B1B; text-decoration: underline;">Laboratorium 3</div>
        <div class="navi">zakładka4</div>
        <div class="navi">zakładka5</div>
        <div style="clear:both"></div>
    </nav>
    <main>
    <?php
$link = mysqli_connect("localhost", "root", "")
    or die("Could not connect"); 							

mysqli_select_db($link, "oiw")
    or die("Could not select database"); 
	                                     
mysqli_query($link, "SET NAMES utf8");
$query  = "SELECT * FROM `ogloszenia`";      
$result = mysqli_query($link, $query)  
    or die("Error");

while ($row = mysqli_fetch_array($result)) {
    echo	
	"<b>". $row["ID_Ogloszenia"]."</b><br/>".
	"<b>". $row["ID_Uzytkownika"]."</b><br/>".
	"<b>". $row["Kategoria"]."</b><br/>".
	
		
}
mysqli_free_result($result);   
mysqli_close($link);		  
?>
    </main>
    <footer>
        To jest stopka. &copy; 2018 Wykonał: Przemysław Chabowski 165 IC B2
    </footer>
    </div>           
</body>
</html>