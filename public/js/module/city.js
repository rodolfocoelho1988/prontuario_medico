var sysmedic = sysmedic || {};

sysmedic.city = (function() {

    var get = function(estado) {
        var error = function(resp) {
        };

        var success = function(cidades) {
            var html = '';
            cidades.forEach(function(cidade){
                html += "<option value="+cidade.id+">"+cidade.nome+"</option>";
            });

            $("#cidade").html(html).material_select();
        };
        sysmedic.ajax.send('GET', '/cidade/'+estado+'', '', 'json', '', error, success);
    };

    return {
        get: get
    };

}());