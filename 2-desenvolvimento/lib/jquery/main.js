 $(document).ready(function() {

    //Modal
     $('.modal').modal();

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


      


    