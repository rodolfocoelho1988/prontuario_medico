var sysmedic = sysmedic || {};

sysmedic.medicalrecord = (function() {

    /**
     * Se abrir uma vez o modal não irá mais recuperar os dados;
     * @type {boolean}
     */
    var abriuHipotese = false;
    var abriuPrescricao = false;
    var abriuEvolucao = false;
    var abriuAtestado = false;

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
            };

            sysmedic.ajax.send('GET', '/prontuario/anamnese/'+agendamento+'', '', 'json', '', error, success);
        },
        save: function(id) {
            var error = function(resp) {
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

            var success = function(response) {
                Materialize.toast(response, 10000, 'rounded');
            };

            var dados = $('#anamnese-form').serialize();
            dados += '&agendamento='+id;

            sysmedic.ajax.send('POST', '/prontuario/anamnese/save', dados, 'json', '', error, success);
        }
    };
    var hipotese = {
        modal: function(agendamento) {
            var error = function(errors) {

            };

            var success = function(response) {
                for(index in response)
                    $('#'+index).val(response[index]);

                $('#modal-hipotese').openModal();
                abriuHipotese = true;
            };

            if(abriuHipotese === false)
                sysmedic.ajax.send('GET', '/prontuario/hipotese/'+agendamento+'', '', 'json', '', error, success);
            else {
                $('#modal-hipotese').openModal();
            }
        },
        save: function(id) {
            var error = function(resp) {
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

            var success = function(response) {
                Materialize.toast(response, 10000, 'rounded');
            };

            var dados = $('#hipotese-form').serialize();
            dados += '&agendamento='+id;

            sysmedic.ajax.send('POST', '/prontuario/hipotese/save', dados, 'json', '', error, success);
        }
    };
    var prescricao = {
        modal: function(agendamento) {
            var error = function(errors) {

            };

            var success = function(response) {
                $('#informacao-prescricao').val(response.informacao);

                $('#modal-prescricao').openModal();
                abriuPrescricao = true;
            };

            if(abriuPrescricao === false)
                sysmedic.ajax.send('GET', '/prontuario/prescricao/'+agendamento+'', '', 'json', '', error, success);
            else {
                $('#modal-prescricao').openModal();
            }
        },
        save: function(id) {
            var error = function(resp) {
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

            var success = function(response) {
                Materialize.toast(response, 10000, 'rounded');
            };

            var dados = $('#prescricao-form').serialize();
            dados += '&agendamento='+id;

            sysmedic.ajax.send('POST', '/prontuario/prescricao/save', dados, 'json', '', error, success);
        }
    };
    var evolucao = {
        modal: function(agendamento) {
            var error = function(errors) {

            };

            var success = function(response) {
                $('#informacao-evolucao').val(response.informacao);

                $('#modal-evolucao').openModal();
                abriuEvolucao = true;
            };

            if(abriuEvolucao === false)
                sysmedic.ajax.send('GET', '/prontuario/evolucao/'+agendamento+'', '', 'json', '', error, success);
            else {
                $('#modal-evolucao').openModal();
            }
        },
        save: function(id) {
            var error = function(resp) {
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

            var success = function(response) {
                Materialize.toast(response, 10000, 'rounded');
            };

            var dados = $('#evolucao-form').serialize();
            dados += '&agendamento='+id;

            sysmedic.ajax.send('POST', '/prontuario/evolucao/save', dados, 'json', '', error, success);
        }
    };
    var atestado = {
        modal: function(agendamento) {
            var error = function(errors) {

            };

            var success = function(response) {
                $('#informacao-atestado').val(response.informacao);

                $('#modal-atestado').openModal();
                abriuAtestado = true;
            };

            if(abriuAtestado === false)
                sysmedic.ajax.send('GET', '/prontuario/atestado/'+agendamento+'', '', 'json', '', error, success);
            else {
                $('#modal-atestado').openModal();
            }
        },
        save: function(id) {
            var error = function(resp) {
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

            var success = function(response) {
                Materialize.toast(response, 10000, 'rounded');
            };

            var dados = $('#atestado-form').serialize();
            dados += '&agendamento='+id;

            sysmedic.ajax.send('POST', '/prontuario/atestado/save', dados, 'json', '', error, success);
        }
    };

    return {
        anamnese: anamnese,
        hipotese: hipotese,
        prescricao: prescricao,
        evolucao: evolucao,
        atestado: atestado
    };

}());