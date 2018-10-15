document.querySelector('button').onclick = function () {
    if (document.getElementById('tekst').innerHTML === "Tekst 1") {
        document.getElementById("tekst").innerHTML = 'Tekst 2';
    } else {
        document.getElementById("tekst").innerHTML = 'Tekst 1';
    }
}