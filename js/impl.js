addSeccao = false;

function createTextField() {
    if (!addSeccao) {
        document.getElementById('navbar-nav').innerHTML += "<form id='nomeSeccaoForm' action='../control/SeccaoController.php?op=cad' method='post' name='formcad'>" +
            "<input name='nomeSeccao' id='nomeSeccao' class='form-control'" +
            "type='text' value='' required title='Aperte Enter para confirmar' autofocus/>" +
            "</form>";
        addSeccao = true;
        var nomeSeccao = document.getElementById("nomeSeccao");
        nomeSeccao.addEventListener("keyup", function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                closeTextField()
            }
        });
    } else {
        alert("Já há um campo em aberto!")
    }

}

function closeTextField() {
    if (addSeccao) {
        document.getElementById('nomeSeccaoForm').remove();
        addSeccao = false;
    }
}