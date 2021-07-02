  // navbar mobile
  $(document).ready(function(){
    $('.sidenav').sidenav();
  });
  // navbar mobile
$(document).ready(function(){
  $(".dropdown-trigger").dropdown();
  });

 
 $(document).ready(function(){
    $('.collapsible').collapsible();
  });
        
  $(document).ready(function(){
    $('select').formSelect();
  });

  $(document).ready(function(){
    $('.carousel').carousel();


  });
  $('.carousel.carousel-slider').carousel({
    fullWidth: true,
    indicators: true
  });


  $('.btum').click(function() {
    $('.carousel').carousel('next');
});

function tamanho(){

  var tamTela = $(window).width();
  var tamTela2 = tamTela - 20;

    

 if(tamTela <= 500){
  $('#modal').width(tamTela2);

   $('#alturaresponsiva').removeClass('pcaltura');
   $('#alturaresponsiva').addClass('mobilealtura');

   $('#datalembreteresponsivo').removeClass('pcdata');
   $('#datalembreteresponsivo').addClass('mobiledata');

   $('#titulolembreteresponsivo').removeClass('pctitulo');
   $('#titulolembreteresponsivo').addClass('mobiletitulo');
   

   $('#conteudolembreteresponsivo').removeClass('pcconteudo');
   $('#conteudolembreteresponsivo').addClass('mobileconteudo');  

  $('#dataevento').css({
    'width': '100%'
  });
   $('#scrollhome').css({
    'overflow': 'auto'
  });
  $('#caroca').css({
    'width': '100%'
  });
   $('#caroca').css({
    'margin-left': '0%'
  });
   $('#btentrar').css({
    'width': '100%'
  });
    $('#btcad').css({
    'width': '100%'
  });
       $('#mapalegenda').css({
    'width': '100%'
  });
       $('#modalentrar').css({
    'width': '100%'
  });
            $('#modalcadastro').css({
    'width': '100%'
  });
   $('#juuj').css({
    'overflow': 'auto'
  });
     $('#cardmobile').css({
    'width': '100%'
  });
  $('#inicioevento').css({
    'width': '100%'
  });
  $('#terminoevento').css({
    'width': '100%'
  });
  $('#divnomevento').css({
    'width': '100%'
  });
  }

else{}


}





// efeito da index
  $(document).ready(function(){
    $('.parallax').parallax();
  });
// efeito da index


// scroll da index
jQuery(document).ready(function($) { 
    $(".scroll").click(function(event){        
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top}, 600);
   });
});
// scroll da index


 $(document).ready(function(){
    $('.fixed-action-btn').floatingActionButton();
  });

  $(document).ready(function(){
    $('.modal').modal();
  });



jQuery(document).ready(function($) {
	$("#CPF").mask("999.999.999-99")

})
jQuery(document).ready(function($) {
	$("#Senha").mask("99999999")
})

jQuery(document).ready(function($) {
  $("#dataevento").mask("99/99/9999")
})

jQuery(document).ready(function($) {
  $("#datalembrete").mask("99/99/9999")
})


jQuery(document).ready(function($) {
  $("#inicioevento").mask("99:99")
})
jQuery(document).ready(function($) {
  $("#terminoevento").mask("99:99")
})



$(document).ready(function(){
    $('.tap-target').tapTarget();
  });


        $(document).ready(function() {

             $(window).scroll(function() {

                 var scroll = $(window).scrollTop();


                 if (scroll >= 100) {
        


                    $('#navcor').removeClass('primeiranav');

                    $('#navcor').addClass('segundanav');

                    $('#logo').removeClass('logo');

                    $('#logo').addClass('logo2');


                    $('#li').removeClass('linav');

                    $('#li').addClass('linav2');


                    $('#li2').removeClass('linav');

                    $('#li2').addClass('linav2');


                    $('#li3').removeClass('linav');

                    $('#li3').addClass('linav2');



                     $('#li4').removeClass('linav');

                    $('#li4').addClass('linav2');


                 } 



                 else{
                     $('#navcor').removeClass('segundanav');

                    $('#navcor').addClass('primeiranav');

                    $('#logo').removeClass('logo2');

                    $('#logo').addClass('logo');


                    $('#li').removeClass('linav2');

                    $('#li').addClass('linav');


                    $('#li2').removeClass('linav2');

                    $('#li2').addClass('linav');


                    $('#li3').removeClass('linav2');

                    $('#li3').addClass('linav');



                     $('#li4').removeClass('linav2');

                    $('#li4').addClass('linav');




                 };


        });
              });