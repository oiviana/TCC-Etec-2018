$(document).ready(iniciar);

function iniciar()
{
$("button").click(function(){


if ("#lembreteput" != null) {
var lembrete = $('#lembreteput').val();


$(".barrax").append('<p class="textolembrete">'+lembrete+'<p>');
        $('#lembreteput').val("");


};


});
}