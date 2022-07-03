const urlSearchParams = new URLSearchParams(window.location.search);
const params = Object.fromEntries(urlSearchParams.entries());

if(params.punct_suspendat == 'final'){
    toastr.success('Punctul de lucru a fost suspendat.', 'Informare');
}

// =============================================================
// APROBARE A UNUI PUNCT DE LUCRU DE CATRE ADMINISTRATOR
// =============================================================
let modal = $('#modal-aprobare-suspendare-punct');

$('body').on('click', '.suspenda-punct-lucru', function () {
    let punctLucruID = parseInt($(this).attr('data-punct-lucru-id'));

    let modalContent = $('#modal-aprobare-suspendare-punct-content');
    let modalContentHtml =
        `<div>
            <div>Sunteți sigur că doriți să aprobați suspendarea acestui punct de lucru?</div>
            <div class="d-flex flex-row justify-content-center">
                <button 
                    class="btn btn-success btn-sm mx-1 btn-aprobare-suspendare-punct-final" 
                    data-punct-lucru-id='${punctLucruID}'>DA, suspendă</button>
                <button 
                    class="btn btn-danger btn-sm mx-1 btn-cancel">NU, anulează</button>
            </div>
        </div>`
    modalContent.html(modalContentHtml);
    modal.modal('show');
});

$('body').on('click', '.btn-aprobare-suspendare-punct-final', function(){
    let punct_lucru_id = parseInt($(this).attr('data-punct-lucru-id'));
    $.ajax({
            url: "index.php?r=structuri-subordonate-puncte-lucru/aprobare-propunere-suspendare",
            type: "POST",
            data: {punct_lucru_id},
            success: function (response) {
                if(response.response_code == 200){
                    window.location.href = 'index.php?r=structuri-subordonate-puncte-lucru/propuneri-suspendare&punct_suspendat=final';
                }
            }
        });
})

$('body').on('click', '.btn-cancel', function(){
   modal.modal('hide');
})