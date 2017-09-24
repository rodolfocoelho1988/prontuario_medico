var sysmedic = sysmedic || {};

sysmedic.medicalrecord = (function() {

    /**
     * Se abrir uma vez o modal não irá mais recuperar os dados;
     * @type {boolean}
     */
    var abriuAnamnese = false;

    var anamnese = {
        modal: function(agendamento) {
            var error = function(errors) {

            };

            var success = function(response) {
                for(index in response) {
                    if(response[index] == 1 || response[index] == 0)
                        $('#'+index).prop('checked', parseInt(response[index]));
                    else
                        $('#'+index).val(response[index]);
                }
                $('#modal-anamnese').openModal();
                abriuAnamnese = true;
            };

            if(abriuAnamnese === false)
                sysmedic.ajax.send('GET', '/prontuario/anamnese/'+agendamento+'', '', 'json', '', error, success);
            else {
                $('#modal-anamnese').openModal();
            }
        },
        save: function(id) {
            var error = function(errors) {

            };

            var success = function(response) {
                console.log(response);
            };

            var dados = $('#anamnese-form').serialize();
            dados += '&agendamento='+id;

            sysmedic.ajax.send('POST', '/prontuario/anamnese/save', dados, 'json', '', error, success);
        }
    };

    return {
        anamnese: anamnese
    };

}());