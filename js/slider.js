var count = 1;
var left = 0;
var start = 0;

function move() {
    left = document.getElementById('part-1').offsetWidth;

    if (count == 3) {
        count = 1;
        start = 0;
        left *= 2;
        var id = setInterval(resetPosition, 1);
        return;
    }

    left *= count;

    function moveLeft() {
        start++;
        if (start == left) clearInterval(id);
        start++;
        if (start == left) clearInterval(id);
        start++;
        document.getElementById("car-holder").style.marginLeft = "-" + start + 'px';
        if (start == left) clearInterval(id);
    }

    function resetPosition() {
        left--;
        if (left == 0) clearInterval(id);
        left--;
        if (left == 0) clearInterval(id);
        left--;
        if (left == 0) clearInterval(id);
        left--;
        if (left == 0) clearInterval(id);
        left--;
        if (left == 0) clearInterval(id);
        left--;
        document.getElementById("car-holder").style.marginLeft = "-" + left + 'px';
        if (left == 0) clearInterval(id);
    }

    var id = setInterval(moveLeft, 1);
    count++;
}

setInterval(function() {
    move();
}, 5000);