var sysmedic = sysmedic || {};

sysmedic.dashboard = (function() {

    // Mensagem no toast de boas vindas
    var start = function() {
        setTimeout(function() {
            Materialize.toast('Bom trabalho =)', 4000)
        }, 4000);
    };

    // CounterUp Plugin
    var counterup = function() {
        $('.counter').each(function () {
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
            }, {
                duration: 3500,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                    $(this).text($(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                }
            });
        });
    };

    return {
        start: start,
        counterup: counterup
    };

}());