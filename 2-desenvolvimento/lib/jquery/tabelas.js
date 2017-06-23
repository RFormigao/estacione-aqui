$(document).ready(function() {

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

