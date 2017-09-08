var sysmedic = sysmedic || {};

sysmedic.telephone = (function() {

    var add = function() {
        var html = '<div class="input-field col s4">\n' +
            '                        <select class=\'browser-default\' name="telefone[][tipo]">\n' +
            '                            <option value="1">Residencial</option>\n' +
            '                            <option value="2">Celular</option>\n' +
            '                        </select>\n' +
            '                    </div>\n' +
            '                    <div class="input-field col s8">\n' +
            '                        <input placeholder="Telefone" name="telefone[][numero]" id="telefone" type="text" class="telefone">\n' +
            '                        <label for="telefone">Telefone</label>\n' +
            '                    </div>';
        $("#telefone-add").append(html);
        mask();
    };

    var mask = function() {
        $('.telefone').mask('(00) 0000-00009');
        $('.telefone').blur(function(event) {
            if($(this).val().length === 15){ // Celular com 9 dígitos + 2 dígitos DDD e 4 da máscara
                $('.telefone').mask('(00) 00000-0009');
            } else {
                $('.telefone').mask('(00) 0000-00009');
            }
        });
    }

    return {
        add: add,
        mask: mask
    };

}());