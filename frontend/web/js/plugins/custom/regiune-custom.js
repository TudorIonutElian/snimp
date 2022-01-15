$(function () {
    /*==============================================================
*   ================ CREATE  REGIUNE  ==============================
*   ============================================================== */
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
    });

    /*==============================================================
    * ================ UPDATE REGIUNE ==============================
    * ============================================================== */
    $('.update-regiune-button').click(function (){
        let modalUpdateRegiune = $('#modal-editare-regiune');
        modalUpdateRegiune.removeAttr('tabindex');
        $('.modal-content').css({
            'min-width': '300px',
            'min-height': '20vh',
            'position': 'relative',
            'top': '50%',
            'left': '50%',
            'transform' : 'translate(-50%, 30%)'
        });

        modalUpdateRegiune.modal('show').find('#modal-editare-regiune-content').load($(this).attr('value'));
    });

    /*==============================================================
   * ================ UPDATE REGIUNE ==============================
   * ============================================================== */

    $('.view-regiune-buttton').click(function (){
        let modalViewRegiune = $('#modal-vizualizare-regiune');
        modalViewRegiune.removeAttr('tabindex');
        $('.modal-content').css({
            'min-width': '300px',
            'min-height': '20vh',
            'position': 'relative',
            'top': '50%',
            'left': '50%',
            'transform' : 'translate(-50%, 30%)'
        });

        modalViewRegiune.modal('show').find('#modal-vizualizare-regiune-content').load($(this).attr('value'));
    });

    /*==============================================================
   * ================ DELETE REGIUNE ==============================
   * ============================================================== */

})