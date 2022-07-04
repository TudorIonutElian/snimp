

$('body').on('click', '#atribuire-programare', function(event){
    event.preventDefault();
    const lucrator_id = $('#w0').val();
    const programare_id = Number($(this).attr('data-programare-id'));

    $.ajax({
        url: "index.php?r=programare/atribuire",
        type: "POST",
        data: {
            _programare_id: programare_id,
            _lucrator_id: lucrator_id
        },
        success: function (response) {
            if(response.response_code === 200){
                window.location.href = 'index.php?r=programare/index&atribuire=success';
            }
        }
    });
});