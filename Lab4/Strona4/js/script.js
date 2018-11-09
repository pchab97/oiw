function but1() {
    if (document.getElementById('tekst').innerHTML == "Tekst 1") {
        document.getElementById("tekst").innerHTML = 'Tekst 2';
    } else {
        document.getElementById("tekst").innerHTML = 'Tekst 1';
    }
}

function but2() {
    alert("Ten przycisk działa");
}