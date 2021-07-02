    function insertData() {
        var nomevento = $("#nomevento").val();
        var descrievento = $("#descrievento").val();
        var responevento = $("#responevento").val();
        var localevento = $("#localevento").val();
        var dataevento = $("#dataevento").val();
        var inicioevento = $("#inicioevento").val();
        var terminoevento = $("#terminoevento").val();
        var observa = $("#observa").val();

        // AJAX que envia os dados ao arquivo php
        if ($.trim(nomevento).length > 0 && $.trim(descrievento).length > 0 && $.trim(responevento).length > 0 && $.trim(localevento).length > 0 && $.trim(dataevento).length > 0 && $.trim(inicioevento).length > 0 && $.trim(terminoevento).length > 0) {
            $.ajax({
                type: "POST",
                url: "coreventos/insert-data.php",
                data: {
                    nomevento: nomevento,
                    descrievento: descrievento,
                    responevento: responevento,
                    localevento: localevento,
                    dataevento: dataevento,
                    inicioevento: inicioevento,
                    terminoevento: terminoevento,
                    observa: observa
                },
                dataType: "JSON",
                success: function(data) {
                    $("#message").html(data);
                    $("p").addClass("alert alert-success");
                    M.toast({
                        html: 'Evento adicionado!',
                        classes: 'grey darken-1'
                    });
                    $('#modal').modal('close');
                    $("#nomevento").val("");
                    $("#descrievento").val("");
                    $("#responevento").val("");
                    $("#localevento").val("");
                    $("#dataevento").val("");
                    $("#inicioevento").val("");
                    $("#terminoevento").val("");
                    LerEventos();
                },
                error: function(err) {
                    alert(err);
                }
            });
        } else {
            M.toast({
                html: 'Preencha todos os campos!',
                classes: 'grey darken-1'
            });
        }
    }


function insertVisita() {
        var nomevisita = $("#nomevisita").val();
        var emailvisita = $("#emailvisita").val();
        var regivisita = $("#regivisita").val();
        var bairrovisita = $("#bairrovisita").val();
        var motivovisita = $("#motivovisita").val();
        var idadevisita = $("#idadevisita").val();
        var codevento = codEvento;
        
        // AJAX que envia os dados ao arquivo php
        if ($.trim(nomevisita).length > 0 && $.trim(emailvisita).length > 0 && $.trim(regivisita).length > 0 && $.trim(bairrovisita).length > 0 && $.trim(idadevisita).length > 0) {
            $.ajax(
            {

                type: "POST",
                url: "coreventos/insert-visita.php",
                data: {
                    nomevisita: nomevisita,
                    emailvisita: emailvisita,
                    regivisita: regivisita,
                    bairrovisita: bairrovisita,
                    motivovisita: motivovisita,
                    idadevisita: idadevisita,
                    codevento: codevento
                },
                dataType: "JSON",
                success: function(data) {
                    
                    $("#message").html(data);
                    $("p").addClass("alert alert-success");
                    M.toast({
                        html: 'Visita registrada!',
                        classes: 'grey darken-1'
                    });
            
                    $("#nomevisita").val("");
                    $("#emailvisita").val("");
                    $("#regivisita").val("");
                    $("#bairrovisita").val("");
                    $("#idadevisita").val("");

              
                    LerVisitas();                
                },
                error: function(err) {
                    alert(err);
                } 
            });
        } else {
            M.toast({
                html: 'Preencha todos os campos!',
                classes: 'grey darken-1'
            });
        }
    }

        function insertLembrete() {
        var nomelembrete = $("#nomelembrete").val();
        var assuntolembrete = $("#assuntolembrete").val();
        var datalembrete = $("#datalembrete").val();
        alert("chegou1");
        // AJAX que envia os dados ao arquivo php
        if ($.trim(nomelembrete).length > 0 && $.trim(assuntolembrete).length > 0 && $.trim(datalembrete).length > 0) {

            $.ajax({
             
                type: "POST",
                url: "corelembrete/insert-lembrete.php",
                data: {
                    nomelembrete: nomelembrete,
                    assuntolembrete: assuntolembrete,
                    datalembrete: datalembrete
                },
                dataType: "JSON",
                success: function(data) {
                    $("#message").html(data);
                    $("p").addClass("alert alert-success");
                    M.toast({
                        html: 'Lembrete adicionado ao calendário!',
                        classes: 'grey darken-1'
                    });
        $("#nomelembrete").val("");
        $("#assuntolembrete").val("");
        $("#datalembrete").val("");
        LerLembretes();
                },
                error: function(err) {
                    alert(err);
                }
            });
        } else {
            M.toast({
                html: 'Preencha todos os campos!',
                classes: 'grey darken-1'
            });
        }
    }