function tecla() {
    if(event.which == 13)
        abrirLogin();
}
function abrirLogin() {
    var login = $('#login').val();
    var senha = $('#senha').val();
    var settings = {
        "dataType": "json",
        "async": true,
        "crossDomain": true,
        "url": apiHost()+"Login/",
        "data": {
            login: login,
            senha: senha
        },
        "method": "GET",
        "statusCode": {
            404: function() {
                alert( "Usuário ou senha incorretos" );
            },
            200: function() {
                window.location.href='pages/principal.html';
            }
        }
    }

    $.ajax(settings);

}