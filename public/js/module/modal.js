var sysmedic = sysmedic || {};

sysmedic.modal = (function() {

    // Inicializar
    var add = function(title, content) {
        $('#title-modal').html(title);
        $('#content-modal').html(content);
        $('#modal').openModal();
    };

    return {
        add: add,
    };

}());