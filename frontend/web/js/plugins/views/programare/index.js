// =================================================================
// FUNCTIE PENTRU AFISAREA MODALULUI DE CERTIFICARE A VALIDARII
// =================================================================
$('body').on('click', '.btn-validare-programare', function (event) {
    event.preventDefault();
    const programare_id = $(this).attr('data-programare-id');
    const programare_timestamp = $(this).attr('data-timestamp');

    let programareDuplicat = "";

    $.ajax({
        url: `index.php?r=programare/verificare-duplicat`,
        type: 'post',
        data: {
            programare_id: programare_id,
            programare_timestamp: programare_timestamp,
            _csrf: yii.getCsrfToken()
        },
        success: function (response) {
            const programari_duplicat = response.programari_duplicat;

            if (programari_duplicat.length > 0) {
                programareDuplicat += `<div class="text-center font-weight-bold text-danger">Atentie, exista programari duplicat, conform tabelului de mai jos: </div>`;
                programareDuplicat += `
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nume</th>
                        <th scope="col">Prenume</th>
                        <th scope="col">Email</th>
                        <th scope="col">Numar unic</th>
                        <th scope="col">Validata de </th>
                    </tr>
                    </thead>
                    <tbody id="tableRowsDuplicat">

                    `;

                for (let i = 0; i < programari_duplicat.length; i++) {

                    programareDuplicat +=
                        `<tr>
                          <th scope="row">${i + 1}</th>
                          <td>${programari_duplicat[i].programare_nume}</td>
                          <td>${programari_duplicat[i].programare_prenume}</td>
                          <td>${programari_duplicat[i].programare_email}</td>
                          <td>${programari_duplicat[i].programare_numar_unic}</td>
                          <td>${programari_duplicat[i].programare_validata_de}</td>
                        </tr>`;

                }

                programareDuplicat +=
                    `</tbody>
                </table>`;

            }

            let modalContent = `
                        <div>
                            <div class="text-center">Sunteți sigur că ați verificat datele programării ?</div>
                            <div>${programareDuplicat}</div>
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


        }

    });
});


// =================================================================
// FUNCTIE PENTRU ASCUNDEREA MODALULUI DE CERTIFICARE A VALIDARII
// =================================================================
$('body').on('click', '.btn-anuleaza-validare-modal', function () {
    $('#modal-validare-programare').modal('hide');
});


$('body').on('click', '.btn-valideaza-final', function () {
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
            if (response_code === 200) {
                $('#modal-validare-programare').modal('hide');
                toastr.success('Programare validata', 'Notificare');

                setTimeout(function () {
                    window.location.reload();
                }, 800);
            }

        }

    });
});

$('body').on('click', '.btn-anulare-programare', function (event) {
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


$('body').on('click', '.btn-renuntare-final', function (event) {
    event.preventDefault();
    const programare_id = $(this).attr('data-programare-id');

    $.ajax({
        url: `index.php?r=programare/anulare`,
        type: 'post',
        data: {
            programare_id: programare_id,
            _csrf: yii.getCsrfToken()
        },
        success: function (response) {
            const response_code = response.response_code;
            if (response_code === 200) {
                $('#modal-validare-programare').modal('hide');
                toastr.success('Programare anulata', 'Notificare');

                setTimeout(function () {
                    window.location.reload();
                }, 800);
            }

        }

    });

});
