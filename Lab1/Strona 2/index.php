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
	
	"<b><TR>ID_Oglosznia:&nbsp&nbsp". $row["ID_Ogloszenia"]."</b><br/>".
	"<b><TR>ID_Uzytkownika:&nbsp&nbsp". $row["ID_Uzytkownika"]."</b><br/>".
	"<b><TR>Kategoria:&nbsp&nbsp". $row["Kategoria"]."</b><br/>".
         "</TR><TR></TR>\n<br/>";
	
		
}

mysqli_free_result($result);   
mysqli_close($link);		  

?>
