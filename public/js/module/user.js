var sysmedic = sysmedic || {};

sysmedic.user = (function() {

    var changePerfil = function() {
        var valor = $("#type").val();
        if(valor === "medico") {
            $("#login-div-input").removeAttr("type").removeAttr("name").attr("type", "text").attr("name", "user[crm]");
            $("#login-div-label").text("CRM");
        } else {
            $("#login-div-input").removeAttr("type").removeAttr("name").attr("type", "email").attr("name", "user[email]");
            $("#login-div-label").text("Email");
        }
    };

    var login = function() {
        var form = $("#login-form");

        var error = function(resp) {
            sysmedic.ajax.removeLoading('loading', 'logar');
            var values = resp.responseJSON;
            var errors = '';
            var key;
            for(key in values) {
                values[key].forEach(function(error) {
                    errors += error + "<br />";
                });
            }
            Materialize.toast(errors, 5000, 'rounded');
        };

        var success = function(resp) {
            $(location).attr('href','/');
        };

        sysmedic.ajax.send('POST', '/login', form.serialize(), 'json', sysmedic.ajax.beforeSend('loading', 'logar'), error, success);
    };

    var maskCPF = function() {
        $("#cpf").mask('000.000.000-00');
    };

    var disable = function(id) {
        var error = function(resp) {
        };

        var success = function(resp) {
            window.location.reload();
        };

        sysmedic.ajax.send('GET', '/usuario/desativar/'+id, '', 'json', '', error, success);
    };

    var active = function(id) {
        var error = function(resp) {
        };

        var success = function(resp) {
            window.location.reload();
        };

        sysmedic.ajax.send('GET', '/usuario/ativar/'+id, '', 'json', '', error, success);
    };

    return {
        changePerfil: changePerfil,
        login: login,
        maskCPF: maskCPF,
        disable: disable,
        active: active
    };

}());