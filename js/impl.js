fields = 0;
var nomeSeccao;
function createTextField() {
    if (fields == 0) {
        document.getElementById('navbar-nav').innerHTML += "<form action='../control/SeccaoController.php?op=cad' method='post' name='formcad'>"+
        "<input name='nomeSeccao' id='nomeSeccao' class='form-control'"+
        "type='text' value='' required title='Aperte Enter para confirmar'/>"+
        "</form>";
        fields++;

        nomeSeccao = document.getElementById("nomeSeccao");

        nomeSeccao.addEventListener("keyup", function (event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                var x = document.getElementById("nomeSeccao").value;
                if(x != ""){
                
                    // document.getElementById('navbar-nav').innerHTML += "<li class='nav-item'>" +
                    //     "<a class='nav-link js-scroll-trigger' href='#" + x + "'>"+ x +"</a></li>";
                    document.getElementById('nomeSeccao').remove();
                    fields--;
                }else{
                    document.getElementById('nomeSeccao').remove();
                    fields--;
                }
            }
        });
    } else {
        alert("Já há um campo para ser preenchido!")
        //document.getElementById('testandoo').innerHTML += "<br />Only 10 upload fields allowed.";
        document.form.add.disabled = true;

    }

}