$(document).ready(function(){
    $("#tArt").hide();
    $("#infoDelete").hide();
    $("#tablaConsulta").hide();

   
    //$('[data-toggle="tooltip"]').tooltip();
      

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.items', function(e){
        e.preventDefault();
        var urlvalor = $(this).attr("href");
        
        $.ajax({
            url: urlvalor,
            type: 'GET',
            success: function(response){
            var contenido = "";    
                
                for(i in response){
                    contenido += "<tr>" +
                                "<td>"+ response[i].Nombre +"</td>" +
                                "<td>"+ response[i].Precio +"</td>" +
                                "<td>"+ response[i].Activo +"</td>" +
                                "</tr>";

                    
                }

                $("#ListArticulo").html(contenido);
            
                $("#tArt").show();
                
            }
        })

    });

    $(".delete").click(function(e){
        e.preventDefault();

        if(confirm("Estas seguro de que quieres borrar")){
            var urlvalor = $(this).attr("href");
            var form = $(this)[0].parentElement;
            var row = $(form)[0].parentElement.parentElement;


            $.post(urlvalor, $(form).serialize(), function(response){

                $("#infoDelete").html(response.mensaje);
                $("#articulosTotal").html(response.total);
                $(row).fadeOut();
                $("#infoDelete").show();
            });
            
        }else{
            return false;
        }
    }); 

    $("#form-crear").submit(function(e){
        e.preventDefault();
        var urlvalor = $(this).attr("action");
        $.ajax({
            url: urlvalor, 
            type: 'POST',
            data: $(this).serialize(),
            success: function(response){
                console.log(response);
            }
        })
    })

    /*$("#consulta").keypress(function(){
        var form = $(this)[0].parentElement.parentElement;
        var urlvalor = $(form).attr(''); 
    });*/

    $(".form-delete-imagen").submit(function(e){
        e.preventDefault();
        var urlvalor = $(this).attr('action');
        var card = $(this)[0].parentElement.parentElement;

        $.post(urlvalor, $(this).serialize(), function(response){
            $(card).fadeOut();
        });
    });

    $(".imagenesGaleria").fancybox({
        
    });

});