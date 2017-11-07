onload = function() {

    var x = 10,
        block1 = document.getElementById('block1'),
        firstInterval,
        z = 1;
    block1.innerHTML = x;

    function counter() {
        if (x < 1) {
            block1.innerHTML = ' OK ';
            if (typeof firstInterval !== undefined) {
                clearInterval(firstInterval);
            }
        } else {
            block1.innerHTML = x--;
        }
    }

    block1.addEventListener('click', function() {
        if ((z === 1) && (x > 0)) {
            firstInterval = setInterval(counter, 1000);
            z = 2;
            console.log('1 ' + firstInterval);
        } else if ((z === 2) && (x > 0)) {
            clearInterval(firstInterval);
            console.log('2 ' + firstInterval);
            z = 1;
        } else {
            block1.innerHTML = 'Count is over';
        }
    });


    var xs = $('button').on('click', function() {
        this.attr('class', 'clicked');
    });

};