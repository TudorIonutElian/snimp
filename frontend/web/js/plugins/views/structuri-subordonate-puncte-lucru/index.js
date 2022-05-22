// =============================================================
// APROBARE A UNUI PUNCT DE LUCRU DE CATRE ADMINISTRATOR
// =============================================================

$('body').on('click', '.aproba_punct_lucru', function () {
    let punctLucruID = parseInt($(this).attr('data-punct-lucru-id'));
    let modal = $('#modal-aprobare-punct');
    let modalContent = $('#modal-aprobare-punct-content');

    let modalContentHtml =
        `<div>
            <div>Sunteți sigur că doriți să aprobați deschiderea acestui punct de lucru?</div>
            <div class="d-flex flex-row justify-content-center">
                <button 
                    class="btn btn-success btn-sm mx-1" 
                    data-punct-lucru-id="punctLucruID">DA, aprob</button>
                <button 
                    class="btn btn-danger btn-sm mx-1">NU, anulează</button>
            </div>
        </div>`
    modalContent.html(modalContentHtml);
    modal.modal('show');
});