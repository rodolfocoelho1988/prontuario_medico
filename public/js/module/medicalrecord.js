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
                    if(response[index] == 1 || response[index] == 0) {
                        console.log('#'+index, response[index]);
                        $('#'+index).prop('checked', response[index]);
                    }
                }
                $('#modal-anamnese').openModal();
                abriuAnamnese = true;
            };

            if(abriuAnamnese === false)
                sysmedic.ajax.send('GET', '/prontuario/anamnese/'+agendamento+'', '', 'json', '', error, success);
            else {
                $('#modal-anamnese').openModal();
            }
        }
    };

    return {
        anamnese: anamnese
    };

}());