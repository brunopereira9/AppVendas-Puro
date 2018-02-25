$(document).ready(function(){
    $("#form-login").submit(function(){
        var appLogin = $('#app-login').val();
        var appSenha = $('#app-senha').val();
        var settings = {
            "dataType": "json",
            "async": true,
            "crossDomain": true,
            "url": apiHost()+"Login/login.php",
            "method": "GET",
            "data": {
                login: appLogin,
                senha: appSenha
            }
        }

        $.ajax(settings)
            .done(function() {
                $(window.document.location).attr('href','pages/principal.php');
            })
            .fail(function() {
                alert( "Usuário ou senha incorretos." );
            });
        return false;
    });
});