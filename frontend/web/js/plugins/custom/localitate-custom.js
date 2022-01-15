$(function (){
    /*==============================================================
*   ================ CREATE localitate ==============================
*   ============================================================== */
    $('#add-localitate-btn').click(function () {
        let modalLocalitate = $('#modal-adaugare-localitate');
        modalLocalitate.removeAttr('tabindex');
        $('.modal-content').css({
            'min-width': '300px',
            'min-height': '20vh',
            'position': 'relative',
            'top': '50%',
            'left': '50%',
            'transform' : 'translate(-50%, 10%)'
        });

        modalLocalitate.modal('show').find('#modal-adaugare-localitate-content').load($(this).attr('value'));
    });

    /*==============================================================
    * ================ VIEW localitate ==============================
    * ============================================================== */

    $('.view-localitate-button').click(function (){
        let modalViewLocalitate = $('#modal-vizualizare-localitate');
        modalViewLocalitate.removeAttr('tabindex');
        $('.modal-content').css({
            'min-width': '300px',
            'min-height': '20vh',
            'position': 'relative',
            'top': '50%',
            'left': '50%',
            'transform' : 'translate(-50%, 30%)'
        });

        modalViewLocalitate.modal('show').find('#modal-vizualizare-localitate-content').load($(this).attr('value'));
    });

    /*==============================================================
   * ================ UPDATE Localitate  ===========================
   * ============================================================== */

    $('.update-localitate-button').click(function (){
        let modalUpdateLocalitate = $('#modal-editare-localitate');
        modalUpdateLocalitate.removeAttr('tabindex');
        $('.modal-content').css({
            'min-width': '300px',
            'min-height': '20vh',
            'position': 'relative',
            'top': '50%',
            'left': '50%',
            'transform' : 'translate(-50%, 30%)'
        });

        modalUpdateLocalitate.modal('show').find('#modal-editare-localitate-content').load($(this).attr('value'));
    });

});