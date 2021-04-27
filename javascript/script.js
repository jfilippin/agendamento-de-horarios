$(document).ready(function(){
    $("#telefone").mask("(99) 99999-9999");

    $("#ano").mask("9999").change(function(){
        var ano = $(this).val();
        if(ano > 2021 || ano < 1950){
            alert("Ano do automóvel é inválido.");
        }
    });
});
