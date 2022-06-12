const urlParams = new URLSearchParams(window.location.search);
const action = urlParams.get('action');
const result = urlParams.get('result');

if(action == 'salvare'){
    if(result == 200){
        toastr.success('Programarea a fost salvata.', 'Notificare');
    }else if(result == 500){
        toastr.error('Programarea nu a fost salvata. Puteți sesiza acest aspect.', 'Notificare');
    }
}