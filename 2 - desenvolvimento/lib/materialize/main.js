 $(document).ready(function() {
    //Modal
     $('.modal').modal();
     
    var vaga; 
    var hora; 
    var numero;
    var status;
     
    $('.alocar').click(function (){
        vaga = $(this);
        hora = $(this).siblings('.hora');
        numero = $(this).siblings('.descricao').children('.numero');
        status = $(this).siblings('.descricao').children('.status');
       
      $('.confirmar-alocar').click(function () {
          vaga.css("background","#f44336");
          vaga.html("Liberar");
          vaga.attr("href","#liberar");
          hora.css("visibility", "visible");
          numero.css("opacity", "0.2");
          status.css("visibility", "visible");
      });
        
        $('.confirmar-liberar').click(function () {
            vaga.css("background","#26a69a");
            vaga.html("Alocar");
            vaga.attr("href","#alocar");
            hora.css("visibility", "hidden");
            numero.css("opacity", "1");
            status.css("visibility", "hidden");
        });
    });  
     
     
     
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });
      
  });


  $(document).ready(function() {
    $('select').material_select();
  });
      
    