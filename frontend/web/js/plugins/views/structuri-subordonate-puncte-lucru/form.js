$('body').on('click', '#adaugareInstitutieCurenta', function(){
    adaugarePunctLucruInstitutieCurenta();
});

$('body').on('click', '#adaugareStructuraSubordonata', function(){
    adaugarePunctLucruStructuraSubordonata();
});

function adaugarePunctLucruInstitutieCurenta(){
    $('.row-actions').addClass('row-hidden');


}

function adaugarePunctLucruStructuraSubordonata(){
    $('.row-actions').addClass('row-hidden');
    $('.row-structura-subordonata').removeClass('row-hidden');
}