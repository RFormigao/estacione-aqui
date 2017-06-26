 $(document).ready(function() {

    //Modal
     $('.modal').modal({

             ready: function(modal, trigger) {
                 if(document.getElementById("operl").value=="L"){

                     var vagal = document.getElementById("vagal").value;
                     var operl = document.getElementById("operl").value;

                     $.ajax({
                         url: "carregarAlocacao.php",
                         type: "POST",
                         data: "vagal="+vagal+"&operl="+operl,
                         dataType: "html"

                     }).done(function(resposta) {
                         console.log(resposta);
                         var alocar = JSON.parse(resposta);
                         document.getElementById("nomel").value = alocar[0].nome;
                         document.getElementById("veiculol").value = alocar[0].modelo;
                         document.getElementById("placal").value = alocar[0].placa;
                         document.getElementById("datael").value = alocar[0].dataa;
                         document.getElementById("horail").value = alocar[0].hora_entrada;
                         document.getElementById("horaf").value = alocar[0].horaf;
                         document.getElementById("tempo").value = alocar[0].diferenca;



                     }).fail(function(jqXHR, textStatus ) {
                         console.log("Request failed: " + textStatus);

                     }).always(function() {
                         console.log("completou");
                     });

                     $("#op").on('change', function(e){

                         var idperiodo =  $(this).val();

                         $.ajax({
                             url: "carregarValor.php",
                             type: "POST",
                             data: "idperiodo="+idperiodo,
                             dataType: "html"

                         }).done(function(resposta) {
                             console.log(resposta);
                             var periodo = JSON.parse(resposta);
                             document.getElementById("valor").value = periodo[0].valor;



                         }).fail(function(jqXHR, textStatus ) {
                             console.log("Request failed: " + textStatus);

                         }).always(function() {
                             console.log("completou");
                         });

                         return false;
                     });

                 }
             },
             complete: function() {
                 document.getElementById("vagal").value= "";
                 document.getElementById("operl").value = "";
             }
         }
     );

     //option
     $('select').material_select();


     $('.alocar').click(function (){

         var vaga;
         var numero;
         var oper = "I";

         vaga = $(this);
         numero = vaga[0].childNodes[0].childNodes[0].innerHTML;

         document.getElementById("vaga").value = numero;
         document.getElementById("oper").value = oper;


     });

     $('.liberar').click(function (){


         var vagal;
         var numerol;
         var operl = "L";

         vagal = $(this);
         numerol = vagal[0].childNodes[0].childNodes[0].innerHTML;

         document.getElementById("vagal").value = numerol;
         document.getElementById("operl").value = operl;

     });

 });


      


    