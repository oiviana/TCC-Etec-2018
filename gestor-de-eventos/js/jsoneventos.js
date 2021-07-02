
function LerEventos(){
    // conecta ao servidor
    var xmlhttp = new XMLHttpRequest();
    var url = "http://localhost/Sitecor2/coreventos/selectjson.php";
    xmlhttp.onreadystatechange=function() {
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
 
    for(i = 0; i < dados.length; i++) //dados.length retorna o tamanho do vetor.
  { 
    /*conteudo += "DE: " + dados[i].de + 
    "<br/>PARA:" + dados[i].para +
    "<br/>MENSAGEM: " + dados[i].mensagem+
    "<br/>-------------------<br/>";  */  
        
        
      // conteudo += '<div class="container" style="color: black !important;">' + 
      //      '<div class="card">' +
      //      '<strong>' +dados[i].tb1_nomeevento + '</strong>&nbsp;'+'<strong>' +'</strong>&nbsp; <strong>'+ dados[i].tb1_responevento + '</strong>&nbsp;<strong>'+
      //      dados[i].tb1_localevento + ' </strong> </div></div>';
        
        
              
      conteudo += '<ul class="collapsible animated fadeInUp " style="border:none !important; border-radius:7px !important; z-index: 0 !important;">'+
                  '<li>'+
                  '<div class="collapsible-header" style="text-transform: uppercase; background:#4E5A6B; color: white; font-size: 200%; letter-spacing:4px;">'+
                  '<i class="material-icons" style="margin-top: 1.7%;">event'+'</i>'+dados[i].tb1_nomeevento +
                  '</div>'+
                  ' <div class="collapsible-body" style=" background:#2C415D; border:none !important; border-bottom-left-radius: 7px !important; border-bottom-right-radius: 7px !important;">'+
                  '<p style=" font-size:140%; color: white;">Descrição:&nbsp;&nbsp;' +dados[i].tb1_descricao +'</p>'+ '<br>'+
                  '<p style=" font-size:140%; color: white;">Local:&nbsp;&nbsp;' +dados[i].tb1_localevento +'</p>'+ '<br>'+
                  '<p style=" font-size:140%; color: white;">Responsável:&nbsp;&nbsp;' +dados[i].tb1_responevento +'</p>'+ '<br>'+
                  '<p style=" font-size:140%; color: white;">Data:&nbsp;&nbsp;' +dados[i].tb1_data +'</p>'+ '<br>'+
                  '<p style=" font-size:140%; color: white;">Horário de início:&nbsp;&nbsp;' +dados[i].tb1_hr_inicio +'</p>'+ '<br>'+
                  '<p style=" font-size:140%; color: white;">Horário de encerramento:&nbsp;&nbsp;' +dados[i].tb1_hr_termino +'</p>'+ '<br>'+
                  '<p style=" font-size:140%; color: white;">Observações:&nbsp;&nbsp;' +dados[i].tb1_observacoes +'</p>'+ '<br>'+'<br>'+
                  '<button type="button" class="modal-trigger btn waves-effect waves-teal" data-target="modalvisitas" style="background:#4E5A6B; cursor:pointer; font-size: 115%; color: white; width:203px;" onclick="CodEvento(' + dados[i].tb1_codevento + ')">Registrar visitas'+
                  '</button>'+
                  '</div>'+
                  '</li>'+
                  '</ul>';

       

        
        
    }
    document.getElementById("conteudoEventos").innerHTML = conteudo;
}
}
function LerVisitas(){

    // conecta ao servidor
    var xmlhttp = new XMLHttpRequest();
  
    var url = "http://localhost/Sitecor2/coreventos/selectvisitas.php?cod=" + codEvento;         
 
    xmlhttp.onreadystatechange=function() {
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

  conteudo+='<table class="responsive-table" class="centered">'+
            '<thead>'+
            '<tr>'+
            '<th class="titulotabela">Nome'+'</th>'+
            '<th class="titulotabela">Email'+'</th>'+
            '<th class="titulotabela">Município'+'</th>'+
            '<th class="titulotabela">Bairro'+'</th>'+
            '<th class="titulotabela">Motivo'+'</th>'+
            '<th class="titulotabela">Idade'+'</th>'+
            '</tr>'+
            '<tbody>' 
 
    for(i = 0; i < dados.length; i++) //dados.length retorna o tamanho do vetor.
  { 
              
      conteudo += '<tr>'+
                  '<td class="corpotabela">'+dados[i].tb3_nomevisita+'</td>' +
                  '<td class="corpotabela">'+dados[i].tb3_emailvisita+'</td>' +
                  '<td class="corpotabela">'+dados[i].tb3_regiaovisita+'</td>' +
                  '<td class="corpotabela">'+dados[i].tb3_bairrovisita+'</td>' +
                  '<td class="corpotabela">'+dados[i].tb3_motivovisita+'</td>' +
                  '<td class="corpotabela">'+dados[i].tb3_idadevisita+'</td>' +
                  '</tr>';

       

        
     
    }


conteudo+='</tbody></table>';

console.log(conteudo);
    document.getElementById("conteudoVisitas").innerHTML = conteudo;
}
}


codEvento = 0;
function CodEvento(cod)
{
  codEvento = cod;
 
  LerVisitas();

      $('#cordrop').css({
    'color': 'black'
  });
}


function LerLembretes(){
    // conecta ao servidor
    var xmlhttp = new XMLHttpRequest();
    var url = "http://localhost/Sitecor2/corelembrete/selectlembrete.php";
    xmlhttp.onreadystatechange=function() {
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
 
    for(i = 0; i < dados.length; i++) //dados.length retorna o tamanho do vetor.
  { 
        
        
              
      conteudo += '<div class="row animated fadeInRight">'+
                  '<div class="l12 s12">'+
                  '<div class="col l3 s12 pcdata" id="datalembreteresponsivo">'+dados[i].tb5_datalembrete +
                  '</div>'+
                  '<div class="col l9 s12 pcaltura" id="alturaresponsiva">'+
                  '<div class="row pctitulo" id="titulolembreteresponsivo" style="padding-left:2%;">'+dados[i].tb5_nomelembrete +
                  '</div>'+
                  '<ul>'+
                  '<li class="divider" style="background:#3f597c !important;">'+
                  '</li>'+
                  '</ul>'+
                  '<div class="row pcconteudo" id="conteudolembreteresponsivo" style="padding-left:2%;">'+dados[i].tb5_assuntolembrete +
                  '</div>'+
        
                  '</div>'+

                  
                  '</div>'+
                  '<br>'+
                  '<br>'+
                  '<br>'+
                  '</div>';


    }
    document.getElementById("conteudoLembretes").innerHTML = conteudo;
    tamanho();
}
}