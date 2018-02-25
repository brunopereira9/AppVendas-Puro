function logout() {

    var settings = {
        "dataType": "json",
        "async": true,
        "crossDomain": true,
        "url": apiHost()+"Login/logout.php",
        "method": "GET",
        "data":{
            sair : true
        }
    }

    $.ajax(settings)
        .done(function() {
            $(window.document.location).attr('href','../index.html');
        })
        .fail(function() {
            alert( "Erro ao finalizar usuário." );
        });
    return false;
}