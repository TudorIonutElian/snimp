$(function(){
    $('#add-institutie-btn').click(function (){
        console.log('xxx')
        let modalAdaugareInstitutie = $('#modal-adaugare-institutie');
        //modalAdaugareInstitutie.removeAttr('tabindex');
        $('.modal-content').css({
            'min-width': '300px',
            'min-height': '20vh',
            'position': 'relative',
            'top': '50%',
            'left': '50%',
            'transform' : 'translate(-50%, 50%)'
        });

        modalAdaugareInstitutie.modal('show').find('#modal-adaugare-institutie-content').load($(this).attr('value'));
    });
});