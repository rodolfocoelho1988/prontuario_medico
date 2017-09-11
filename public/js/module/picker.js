var sysmedic = sysmedic || {};

sysmedic.picker = (function() {

    var birthdate = function() {
        $('.datepicker').pickadate({
            selectMonths: true,
            selectYears: 200,
            min: new Date(1900,1,1),
            max: true,
            labelMonthNext: 'Proximo Mês',
            labelMonthPrev: 'Mês Anterior',
            //The title label to use for the dropdown selectors
            labelMonthSelect: 'Selecionar Mês',
            labelYearSelect: 'Selecionar Ano',
            //Months and weekdays
            monthsFull: [ 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro' ],
            monthsShort: [ 'Jan', 'Fev', 'Mar', 'Abr', 'Maio', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez' ],
            weekdaysFull: [ 'Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado' ],
            weekdaysShort: [ 'Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb' ],
            //Materialize modified
            weekdaysLetter: [ 'D', 'S', 'T', 'Q', 'Q', 'S', 'S' ],
            formatSubmit: 'yyyy-mm-dd',
            //Today and clear
            today: 'Hoje',
            clear: 'Limpar',
            close: 'Fechar',
        });
    };

    var dateSheduling = function() {
        $('.datepicker').pickadate({
            selectMonths: true,
            selectYears: 1,
            min: new Date(),
            labelMonthNext: 'Proximo Mês',
            labelMonthPrev: 'Mês Anterior',
            //The title label to use for the dropdown selectors
            labelMonthSelect: 'Selecionar Mês',
            labelYearSelect: 'Selecionar Ano',
            //Months and weekdays
            monthsFull: [ 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro' ],
            monthsShort: [ 'Jan', 'Fev', 'Mar', 'Abr', 'Maio', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez' ],
            weekdaysFull: [ 'Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado' ],
            weekdaysShort: [ 'Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb' ],
            //Materialize modified
            weekdaysLetter: [ 'D', 'S', 'T', 'Q', 'Q', 'S', 'S' ],
            formatSubmit: 'yyyy-mm-dd',
            //Today and clear
            today: 'Hoje',
            clear: 'Limpar',
            close: 'Fechar',
        });
    };

    var timeSheduling = function() {
        $('.timepicker').pickatime({
            interval: 10,
            formatLabel: 'HH:i',
            format: 'HH:i',
            closeOnSelect: true,
            min: [8,00],
            max: [20,00]
        });
    };

    return {
        birthdate: birthdate,
        dateSheduling: dateSheduling,
        timeSheduling: timeSheduling
    };

}());