// =================================================================
// FUNCTIE PENTRU AFISAREA MODALULUI DE CERTIFICARE A VALIDARII
// =================================================================
$('body').on('click', '.btn-validare-programare', function (event) {
    event.preventDefault();
    const programare_id = $(this).attr('data-programare-id');

    let modalContent = `
                        <div>
                            <div class="text-center">Sunteți sigur că ați verificat datele programării ?</div>
                            <div class="modal-buttons">
                                    <button 
                                        class="btn btn-success mr-1 btn-valideaza-final" 
                                        data-programare-id="${programare_id}">Da, validează programarea</button>
                                    <button 
                                        class="btn btn-danger mr-1 btn-anuleaza-validare-modal"
                                        data-programare-id="${programare_id}">Nu, anulează acțiunea</button>
                            </div>
                        </div>`;

    $('#modal-validare-programare-content').html(modalContent);
    $('#modal-validare-programare').modal('show');
});


// =================================================================
// FUNCTIE PENTRU ASCUNDEREA MODALULUI DE CERTIFICARE A VALIDARII
// =================================================================
$('body').on('click', '.btn-anuleaza-validare-modal', function(){
    $('#modal-validare-programare').modal('hide');
});


$('body').on('click', '.btn-valideaza-final', function(){
    const programare_final_id = $(this).attr('data-programare-id');

    $.ajax({
        url: `index.php?r=programare/valideaza-programare`,
        type: 'post',
        data: {
            id_progamare: programare_final_id,
            _csrf: yii.getCsrfToken()
        },
        success: function (response) {
            const response_code = response.response_code;
            if(response_code === 200){
                $('#modal-validare-programare').modal('hide');
                toastr.success('Programare validata', 'Notificare');

                setTimeout(function(){
                    window.location.reload();
                }, 800);
            }

        }

    });
});

$('body').on('click', '.btn-anulare-programare', function(event){
    event.preventDefault();
    const programare_id = $(this).attr('data-programare-id');

    let modalContent = `
                        <div>
                            <div class="text-center">Sunteți sigur că ați doriți anularea programării ?</div>
                            <div class="modal-buttons">
                                    <button 
                                        class="btn btn-success mr-1 btn-renuntare-final" 
                                        data-programare-id="${programare_id}">Da, anulează programarea</button>
                                    <button 
                                        class="btn btn-danger mr-1 btn-anuleaza-renuntare-modal"
                                        data-programare-id="${programare_id}">Nu, renunț</button>
                            </div>
                        </div>`;

    $('#modal-anulare-programare-content').html(modalContent);
    $('#modal-anulare-programare').modal('show');
});