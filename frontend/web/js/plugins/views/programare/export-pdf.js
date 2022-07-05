$('body').on('click', '#export_pdf', function (){
    const data_export = $('#w0').val();

    $.ajax({
        url: "index.php?r=programare/export-pdf",
        type: "POST",
        data: {
            _data_export: data_export
        },
        success: function (response) {
            console.log(response)
        }
    });
});