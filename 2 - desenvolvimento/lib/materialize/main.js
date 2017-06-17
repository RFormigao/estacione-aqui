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
     
     
    //data 
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });
    
    //option
    $('select').material_select();
     
    //Tabela
     
     $('table > tbody > tr > td > :checkbox').bind('click change', function(){

        var tr = $(this).parent().parent();

        if($(this).is(':checked'))
        {
            $('.alterar').removeClass('disabled');
            $('.remover').removeClass('disabled');
            $('.inserir').addClass('disabled');
        }
        else 
        {
             $('.alterar').addClass('disabled');
             $('.remover').addClass('disabled');
             $('.inserir').removeClass('disabled');
        }
    });
     
     var NumeroMaximo = 1;
    $("input").click(function()
    {
        if ($("input").filter(":checked").size() > NumeroMaximo)
        {
            return false;
        }
    });
     
     
   
     
     
    $('#pesquisar').keydown(function(){

        var encontrou = false;

        var termo = $(this).val().toLowerCase();

        $('table > tbody > tr').each(function(){

        $(this).find('td').each(function(){

        if($(this).text().toLowerCase().indexOf(termo) > -1) encontrou = true;

    });

    if(!encontrou) $(this).hide();

    else $(this).show();

    encontrou = false;

    });

    });
     
    $('table')

    .tablesorter({
        dateFormat: 'uk',
        headers: {
            0: {
                sorter: false
            },
            5: {
            sorter: false
            }
        }
    });

     
  });


      


    