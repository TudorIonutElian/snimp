let selectInstitutii = $('#formprogramare-programare_institutie');
let selectServicii= $('#formprogramare-programare_serviciu');
let selectPrestari= $('#formprogramare-programare_prestare');


$('#formprogramare-programare_localitate').change(function () {
    let localitateId = parseInt($(this).val());

    // preluare institutii din localitate
    $.ajax({
        url: "index.php?r=institutie/get-institutii-by-localitate-id",
        type: "POST",
        data: {localitateId},
        success: function(response){
            let institutii = response.response_institutii;

            if(institutii.length > 0){
                selectInstitutii.empty();
                selectInstitutii.append(`<option value="0">Selectați instituția</option>`)
                for (let i = 0; i < institutii.length; i++){
                    selectInstitutii.append(`<option value="${institutii[i].id}">${institutii[i].institutie_denumire}</option>`);
                }
            }
        }
    });
});

$('body').on('change', '#formprogramare-programare_institutie', function(){
    let institutie_id = $(this).val();
    // preluare institutii din localitate
    $.ajax({
        url: "index.php?r=institutii-servicii/get-servicii-by-institutie-id",
        type: "POST",
        data: {institutie_id},
        success: function(response){
            let serviciiDisponibile = response.response_servicii;

            if(serviciiDisponibile.length > 0){
                selectServicii.empty();
                selectServicii.append(`<option value="0">Selectați serviciul</option>`)
                for (let i = 0; i < serviciiDisponibile.length; i++){
                    selectServicii.append(`<option value="${serviciiDisponibile[i].id}">${serviciiDisponibile[i].tip_serviciu_denumire}</option>`);
                }
            }
        }
    });
})
// ========================================================================
// ACTIUNE NECESARA PENTRU PRELUAREA TIPURILOR DE PRESTARI
// ========================================================================

$('body').on('change', '#formprogramare-programare_serviciu', function(){
    let serviciu_id = $(this).val();

    $.ajax({
        url: "index.php?r=prestari/get-prestari-by-serviciu-id",
        type: "POST",
        data: {serviciu_id},
        success: function(response){
            let prestariDisponibile = response.response_prestari;

            if(prestariDisponibile.length > 0){
                selectPrestari.empty();
                selectPrestari.append(`<option value="0">Selectați tipul de prestare</option>`)
                for (let i = 0; i < prestariDisponibile.length; i++){
                    selectPrestari.append(`<option value="${prestariDisponibile[i].id}">${prestariDisponibile[i].denumire_p}</option>`);
                }
            }
        }
    });
})