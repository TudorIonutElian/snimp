$(function () {
    $('#add-user-btn').click(function () {
        $('#modal-adaugare-user').removeAttr('tabindex');
        $('.modal-content').css({
            'min-width': '50vw',
            'position': 'relative',
            'top': '50vh',
            'left': '50vw',
            'transform' : 'translate(-50vw, -50vh)'
        });
        $('#modal-adaugare-user').modal('show').find('#modal-adaugare-user-content').load($(this).attr('value'));
    })
})