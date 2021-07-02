function Lerultimoevento() {
    // conecta ao servidor
    var xmlhttp = new XMLHttpRequest();
    var url = "http://localhost/Sitecor2/corehome/selectultevento.php?buscanome=" + $('#inputbuscar').val();
    
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            ConectaServidor(xmlhttp.responseText);
        }
    }
    xmlhttp.open("GET", url, true);
    xmlhttp.send();

    function ConectaServidor(response) {
        var dados = JSON.parse(response); //faz a conversão do texto da WEB para JSON
        var i;
        var conteudo = "";
        var conteudo2 = "";
        var conteudo3 = "";
        var conteudo4 = "";

        for (i = 0; i < dados.length; i++) //dados.length retorna o tamanho do vetor.
        {



            conteudo +=
                '<div class="divnomeventojson animated zoomIn">Local:<br>' + dados[i].tb1_localevento +
                '</div>';

            conteudo2 +=
                '<div style="min-height: 150px;width: 100%; color: white; text-align: center; font-size: 220%; padding-top: 15%;" class="animated zoomIn"> Realizado em:<br>' + dados[i].tb1_data +
                '</div>';

            conteudo3 +=
                '<div style="min-height: 150px;width: 100%; color: white; text-align: center; font-size: 220%; padding-top: 15%;" class="animated zoomIn">' + dados[i].visitantes +
                '<br> Visitas</div>';
            
            conteudo4 +=
                '<div style="min-height: 150px;width: 100%; color: white; text-align: center; font-size: 220%; padding-top: 15%;" class="animated zoomIn"> Horário:<br>' + dados[i].tb1_hr_inicio +
                '</div>';






        }
    
        $(".divnomevento").remove();
        document.getElementById("nomeventobuscado").innerHTML = conteudo;
        document.getElementById("dataeventobuscado").innerHTML = conteudo2;
        document.getElementById("visitaseventobuscado").innerHTML = conteudo3;
        document.getElementById("horaeventobuscado").innerHTML = conteudo4;
        

    }
}

function Lernavdados() {
    // conecta ao servidor
    var xmlhttp = new XMLHttpRequest();
    var url = "http://localhost/Sitecor2/corehome/selectnavdados.php";
    
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            ConectaServidor(xmlhttp.responseText);
        }
    }
    xmlhttp.open("GET", url, true);
    xmlhttp.send();

    function ConectaServidor(response) {
        var dados = JSON.parse(response); //faz a conversão do texto da WEB para JSON
        var i;
        var conteudo = "";
      

        for (i = 0; i < dados.length; i++) //dados.length retorna o tamanho do vetor.
        {



            conteudo +=
                '<p>' + dados[i].totalvisitas +'&nbsp;Visitas registradas</p>';

           





        }
    
  
        document.getElementById("totalvisitasnav").innerHTML = conteudo;

        

    }
}
function Lernavdados2() {
    // conecta ao servidor
    var xmlhttp = new XMLHttpRequest();
    var url = "http://localhost/Sitecor2/corehome/selectnavdados2.php";
    
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            ConectaServidor(xmlhttp.responseText);
        }
    }
    xmlhttp.open("GET", url, true);
    xmlhttp.send();

    function ConectaServidor(response) {
        var dados = JSON.parse(response); //faz a conversão do texto da WEB para JSON
        var i;
        var conteudo = "";
      

        for (i = 0; i < dados.length; i++) //dados.length retorna o tamanho do vetor.
        {



            conteudo +=
                '<p>' + dados[i].totaleventos +'&nbsp;Eventos realizados</p>';

           





        }
    
  
        document.getElementById("totaleventosnav").innerHTML=conteudo;

        

    }
}
