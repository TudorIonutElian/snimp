$(function () {
    $('#add-regiune-btn').click(function () {
        let modalRegiune = $('#modal-adaugare-regiune');
        modalRegiune.removeAttr('tabindex');
        $('.modal-content').css({
            'min-width': '300px',
            'min-height': '20vh',
            'position': 'relative',
            'top': '50%',
            'left': '50%',
            'transform' : 'translate(-50%, 30%)'
        });

        modalRegiune.modal('show').find('#modal-adaugare-regiune-content').load($(this).attr('value'));
    })
})