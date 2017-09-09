var sysmedic = sysmedic || {};

sysmedic.specialty = (function() {

    var get = function(medico) {
        var error = function(resp) {
        };

        var success = function(especialidades) {
            var html = '';
            var tipo;
            especialidades.forEach(function(especialidade){
                html += especialidade.titulo+'<br />';
            });

            sysmedic.modal.add('Especialidades', html);
        };
        sysmedic.ajax.send('GET', '/especialidade/'+medico+'', '', 'json', '', error, success);
    };

    return {
        get: get
    };

}());