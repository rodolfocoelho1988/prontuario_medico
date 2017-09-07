var sysmedic = sysmedic || {};

sysmedic.doctor = (function() {

    var datepicker = function() {
        $('.datepicker').pickadate({

            yearRange: "c-100:c-20",
            selectMonths: true, // Creates a dropdown to control month
            selectYears: true, // Creates a dropdown of 15 years to control year

        });
    };

    var register = function() {
        var form = $("#register-form");

        var error = function(resp) {
            sysmedic.ajax.removeLoading('loading', 'register');
            var values = resp.responseJSON;
            var errors = '';
            var key;
            for(key in values) {
                values[key].forEach(function(error) {
                    errors += error + "<br />";
                });
            }
            Materialize.toast(errors, 10000, 'rounded');
        };

        var success = function(resp) {
            sysmedic.ajax.removeLoading('loading', 'register');
            Materialize.toast("Cadastrado efetuado com sucesso!", 10000, 'rounded');
            form.trigger("reset");
        };

        sysmedic.ajax.send('POST', '/medico/adicionar', form.serialize(), 'json', sysmedic.ajax.beforeSend('loading', 'register'), error, success);
    };

    return {
        register: register,
        datepicker: datepicker
    };

}());