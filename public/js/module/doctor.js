var sysmedic = sysmedic || {};

sysmedic.doctor = (function() {

    var create = function() {
        var form = $("#create-form");

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

        sysmedic.ajax.send('POST', form.attr("action"), form.serialize(), 'json', sysmedic.ajax.beforeSend('loading', 'register'), error, success);
    };

    return {
        create: create
    };

}());