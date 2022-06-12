let selectInstitutii = $('#formprogramare-programare_institutie');
let selectServicii = $('#formprogramare-programare_serviciu');
let selectPrestari = $('#formprogramare-programare_prestare');
let selectStructuri = $('#formprogramare-programare_structura_subordonata');
let selectPuncteLucru = $('#formprogramare-programare_punct_lucru');


$('#formprogramare-programare_localitate').change(function () {
    let localitateId = parseInt($(this).val());

    // preluare institutii din localitate
    $.ajax({
        url: "index.php?r=institutie/get-institutii-by-localitate-id",
        type: "POST",
        data: {localitateId},
        success: function (response) {
            let institutii = response.response_institutii;

            if (institutii.length > 0) {
                selectInstitutii.empty();
                selectInstitutii.append(`<option value="0">Selectați instituția</option>`)
                for (let i = 0; i < institutii.length; i++) {
                    selectInstitutii.append(`<option value="${institutii[i].id}">${institutii[i].institutie_denumire}</option>`);
                }
            }
        }
    });
});

$('body').on('change', '#formprogramare-programare_institutie', function () {
    let institutie_id = $(this).val();
    // preluare institutii din localitate
    $.ajax({
        url: "index.php?r=institutii-servicii/get-servicii-by-institutie-id",
        type: "POST",
        data: {institutie_id},
        success: function (response) {
            let serviciiDisponibile = response.response_servicii;

            if (serviciiDisponibile.length > 0) {
                selectServicii.empty();
                selectServicii.append(`<option value="0">Selectați serviciul</option>`)
                for (let i = 0; i < serviciiDisponibile.length; i++) {
                    selectServicii.append(`<option value="${serviciiDisponibile[i].id}">${serviciiDisponibile[i].tip_serviciu_denumire}</option>`);
                }
            }

            $.ajax({
                url: "index.php?r=institutie/get-structuri-subordonate-by-institutie-id",
                type: "POST",
                data: {institutie_id},
                success: function (response) {
                    let structuriDisponibile = response.response_structuri;

                    if (structuriDisponibile.length > 0) {
                        selectStructuri.empty();
                        selectStructuri.append(`<option value="0">Selectați structura</option>`)
                        for (let i = 0; i < structuriDisponibile.length; i++) {
                            selectStructuri.append(`<option value="${structuriDisponibile[i].id_iss}">${structuriDisponibile[i].institutie_denumire_iss}</option>`);
                        }
                    }
                }
            });
        }
    });

})
// ========================================================================
// ACTIUNE NECESARA PENTRU PRELUAREA TIPURILOR DE PRESTARI
// ========================================================================

$('body').on('change', '#formprogramare-programare_serviciu', function () {
    let serviciu_id = $(this).val();

    $.ajax({
        url: "index.php?r=prestari/get-prestari-by-serviciu-id",
        type: "POST",
        data: {serviciu_id},
        success: function (response) {
            let prestariDisponibile = response.response_prestari;

            if (prestariDisponibile.length > 0) {
                selectPrestari.empty();
                selectPrestari.append(`<option value="0">Selectați tipul de prestare</option>`)
                for (let i = 0; i < prestariDisponibile.length; i++) {
                    selectPrestari.append(`<option value="${prestariDisponibile[i].id}">${prestariDisponibile[i].denumire_p}</option>`);
                }
            }
        }
    });
})

// ========================================================================
// ACTIUNE NECESARA PENTRU PRELUAREA PUNCTELOR DE LUCRU
// ========================================================================


$('body').on('change', '#formprogramare-programare_structura_subordonata', function () {
    let filterObject = {};
    filterObject.institutie  = $('#formprogramare-programare_institutie').val();
    filterObject.serviciu    = $('#formprogramare-programare_serviciu').val();
    filterObject.prestare    = $('#formprogramare-programare_prestare').val();
    filterObject.structuraSubordonata = $('#formprogramare-programare_structura_subordonata').val();
    filterObject.punctLucru  = $('#formprogramare-programare_punct_lucru').val();


    /*
    $.ajax({
        url: "index.php?r=programari/get-sloturi-disponibile",
        type: "POST",
        data: {filterObject},
        success: function (response) {
            console.log(response);
        }
    });

     */
});


// ========================================================================
// ACTIUNE NECESARA PENTRU PRELUAREA sloturilor libere
// ========================================================================
$('body').on('change', '#formprogramare-programare_structura_subordonata', function () {
    let structura_id = $(this).val();

    $.ajax({
        url: "index.php?r=institutii-structuri-subordonate/get-puncte-lucru-by-structura-id",
        type: "POST",
        data: {structura_id},
        success: function (response) {
            let puncteLucruDisponibile = response.response_puncte_lucru;

            if (puncteLucruDisponibile.length > 0) {
                selectPuncteLucru.empty();
                selectPuncteLucru.append(`<option value="0">Selectați punctul de lucru</option>`)
                for (let i = 0; i < puncteLucruDisponibile.length; i++) {
                    selectPuncteLucru.append(
                        `<option value="${puncteLucruDisponibile[i].id_sspl}">
                            Strada ${puncteLucruDisponibile[i].strada_sspl} 
                            Număr ${puncteLucruDisponibile[i].numar_strada_sspl} 
                            Bloc ${puncteLucruDisponibile[i].bloc_strada_sspl} 
                            
                        </option>`);
                }
            }
        }
    });
});

