var sysmedic = sysmedic || {};

sysmedic.table = (function() {

    // Lista de agendamento do dia do dashboard
    var scheduleDay = function() {
        $('#scheduleDay').DataTable({
            language: language()
        });
        $('.dataTables_length select').addClass('browser-default');
    };

    // Tradução personalizada DataTable
    var language = function() {
        return {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            },
            searchPlaceholder: 'Procurar agendamento',

            sSearch: '',
            sLengthMenu: 'Mostrar _MENU_',
            sLength: 'dataTables_length',

            oPaginate: {
                sFirst: '<i class="material-icons">chevron_left</i>',
                sPrevious: '<i class="material-icons">chevron_left</i>',
                sNext: '<i class="material-icons">chevron_right</i>',
                sLast: '<i class="material-icons">chevron_right</i>'
            }
        }
    };

    return {
        scheduleDay: scheduleDay,
    };

}());