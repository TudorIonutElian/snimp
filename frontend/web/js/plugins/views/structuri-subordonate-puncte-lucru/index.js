const urlSearchParams = new URLSearchParams(window.location.search);
const params = Object.fromEntries(urlSearchParams.entries());

if (params.punct_aprobat == 'da') {
    toastr.success('Punctul de lucru a fost aprobat.', 'Informare');
}

if (params.punct_redeschis == 'da') {
    toastr.success('Punctul de lucru a fost redeschis.', 'Informare');
}

// =============================================================
// APROBARE A UNUI PUNCT DE LUCRU DE CATRE ADMINISTRATOR
// =============================================================
let modal = $('#modal-aprobare-punct');
let modalRedeschidere = $('#modal-redeschidere-punct');

$('body').on('click', '.aproba_punct_lucru', function () {
    let punctLucruID = parseInt($(this).attr('data-punct-lucru-id'));

    let modalContent = $('#modal-aprobare-punct-content');
    let modalContentHtml =
        `<div>
            <div>Sunteți sigur că doriți să aprobați deschiderea acestui punct de lucru?</div>
            <div class="d-flex flex-row justify-content-center">
                <button 
                    class="btn btn-success btn-sm mx-1 btn-aprobare-punct" 
                    data-punct-lucru-id='${punctLucruID}'>DA, aprob</button>
                <button 
                    class="btn btn-danger btn-sm mx-1 btn-cancel">NU, anulează</button>
            </div>
        </div>`
    modalContent.html(modalContentHtml);
    modal.modal('show');
});


$('body').on('click', '.btn-aprobare-punct', function () {
    let punct_lucru_id = parseInt($(this).attr('data-punct-lucru-id'));
    $.ajax({
        url: "index.php?r=structuri-subordonate-puncte-lucru/aprobare-punct-lucru",
        type: "POST",
        data: {punct_lucru_id},
        success: function (response) {
            if (response.response_code == 200) {
                window.location.href = 'index.php?r=structuri-subordonate-puncte-lucru/index&punct_aprobat=da';
            }
        }
    });
});

$('body').on('click', '.reactivare_punct_lucru', function () {
    let punctLucruID = parseInt($(this).attr('data-punct-lucru-id'));

    let modalContent = $('#modal-redeschidere-punct-content');
    let modalContentHtml =
        `<div>
            <div>Sunteți sigur că doriți să redeschideți acest punct de lucru?</div>
            <div class="d-flex flex-row justify-content-center">
                <button 
                    class="btn btn-success btn-sm mx-1 btn-redeschide-punct-final" 
                    data-punct-lucru-id='${punctLucruID}'>DA, redeschide</button>
                <button 
                    class="btn btn-danger btn-sm mx-1 btn-cancel">NU, anulează</button>
            </div>
        </div>`
    modalContent.html(modalContentHtml);
    modalRedeschidere.modal('show');
});

$('body').on('click', '.btn-redeschide-punct-final', function () {
    let punct_lucru_id = parseInt($(this).attr('data-punct-lucru-id'));
    $.ajax({
        url: "index.php?r=structuri-subordonate-puncte-lucru/redeschidere-punct-lucru",
        type: "POST",
        data: {punct_lucru_id},
        success: function (response) {
            if (response.response_code == 200) {
                window.location.href = 'index.php?r=structuri-subordonate-puncte-lucru/index&punct_redeschis=da';
            }
        }
    });
});

$('body').on('click', '.btn-cancel', function () {
    modal.modal('hide');
})