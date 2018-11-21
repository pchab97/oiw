var cards = ["1.png", "5.png", "3.png", "1.png", "2.png", "4.png", "3.png", "6.png", "5.png", "2.png", "6.png", "4.png"];

var c0 = document.getElementById('c0');
var c1 = document.getElementById('c1');
var c2 = document.getElementById('c2');
var c3 = document.getElementById('c3');

var c4 = document.getElementById('c4');
var c5 = document.getElementById('c5');
var c6 = document.getElementById('c6');
var c7 = document.getElementById('c7');

var c8 = document.getElementById('c8');
var c9 = document.getElementById('c9');
var c10 = document.getElementById('c10');
var c11 = document.getElementById('c11');

c0.addEventListener("click", function () {
    revealCards(0)
});
c1.addEventListener("click", function () {
    revealCards(1)
});
c2.addEventListener("click", function () {
    revealCards(2)
});
c3.addEventListener("click", function () {
    revealCards(3)
});


c4.addEventListener("click", function () {
    revealCards(4)
});
c5.addEventListener("click", function () {
    revealCards(5)
});
c6.addEventListener("click", function () {
    revealCards(6)
});
c7.addEventListener("click", function () {
    revealCards(7)
});


c8.addEventListener("click", function () {
    revealCards(8)
});
c9.addEventListener("click", function () {
    revealCards(9)
});
c10.addEventListener("click", function () {
    revealCards(10)
});
c11.addEventListener("click", function () {
    revealCards(11)
});

var oneVisible = false;
var turnCounter = 0;
var visible_nr;
var lock = false;
var pairsLeft = 6;

function revealCards(nr) {

    var opacityValue = $('#c' + nr).css('opacity');

    if (opacityValue != 0 && lock == false) {
        lock = true;
        var obraz = "url(/Strona4/memimg/" + cards[nr] + ")";

        $('#c' + nr).css('background-image', obraz);
        $('#c' + nr).addClass('cardA');
        $('#c' + nr).removeClass('card');

        if (oneVisible == false) {
            oneVisible = true;
            visible_nr = nr;
            lock = false;
        } else {
            if (cards[visible_nr] == cards[nr]) {
                setTimeout(function () {
                    hide2Cards(nr, visible_nr)
                }, 750);

            } else {
                setTimeout(function () {
                    restore2Cards(nr, visible_nr)
                }, 1000);
            }

            turnCounter++;
            $('.score').html('Turn counter: ' + turnCounter);
            oneVisible = false;
        }

    }

}

function hide2Cards(nr1, nr2) {
    $('#c' + nr1).css('opacity', '0');
    $('#c' + nr2).css('opacity', '0');

    pairsLeft--;

    if (pairsLeft == 0) {
        alert('Wygrałeś');
        setTimeout("location.href='lab4.html';", 1000);
    }

    lock = false;
}

function restore2Cards(nr1, nr2) {
    $('#c' + nr1).css('background-image', 'url(memimg/0.jpg)');
    $('#c' + nr1).addClass('card');
    $('#c' + nr1).removeClass('cardA');

    $('#c' + nr2).css('background-image', 'url("memimg/0.jpg")');
    $('#c' + nr2).addClass('card');
    $('#c' + nr2).removeClass('cardA');

    lock = false;
}