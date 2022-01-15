$(function(){
    /*==============================================================
    *   ================ CREATE  REGIUNE  ==============================
    *   ============================================================== */
    $('#add-judet-btn').click(function () {
        let modalJudet = $('#modal-adaugare-judet');
        modalJudet.removeAttr('tabindex');
        $('.modal-content').css({
            'min-width': '300px',
            'min-height': '20vh',
            'position': 'relative',
            'top': '50%',
            'left': '50%',
            'transform' : 'translate(-50%, 30%)'
        });

        modalJudet.modal('show').find('#modal-adaugare-judet-content').load($(this).attr('value'));
    });

    /*==============================================================
    * ================ VIEW JUDET     ==============================
    * ============================================================== */

    $('.view-judet-button').click(function (){
        let modalViewJudet = $('#modal-vizualizare-judet');
        modalViewJudet.removeAttr('tabindex');
        $('.modal-content').css({
            'min-width': '300px',
            'min-height': '20vh',
            'position': 'relative',
            'top': '50%',
            'left': '50%',
            'transform' : 'translate(-50%, 30%)'
        });

        modalViewJudet.modal('show').find('#modal-vizualizare-judet-content').load($(this).attr('value'));
    });

    /*==============================================================
* ================ VIEW JUDET     ==============================
* ============================================================== */

    $('.update-judet-button').click(function (){
        let modalEditareJudet = $('#modal-editare-judet');
        modalEditareJudet.removeAttr('tabindex');
        $('.modal-content').css({
            'min-width': '300px',
            'min-height': '20vh',
            'position': 'relative',
            'top': '50%',
            'left': '50%',
            'transform' : 'translate(-50%, 30%)'
        });

        modalEditareJudet.modal('show').find('#modal-editare-judet-content').load($(this).attr('value'));
    });

});