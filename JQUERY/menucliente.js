$(document).ready(function(){

    $("#cambiarclave").click(function(){
         $("#titulo").hide();
         $("#mis_datos_personales").hide();
         $("#cambio_clave").toggle(2000);
         $("#buscar_rendimiento").hide();
    });


   $("#datospersonales").click(function(){
         $("#titulo").hide();
         $("#cambio_clave").hide();
         $("#mis_datos_personales").toggle(2000);
         $("#buscar_rendimiento").hide();
    });

    $("#Informaciondesudeporte").click(function(){
         $("#titulo").hide();
         $("#cambio_clave").hide();
         $("#mis_datos_personales").hide();
         $("#buscar_rendimiento").hide();
    });
     $("#mirendimiento").click(function(){
         $("#buscar_rendimiento").toggle(2000);
         $("#titulo").hide();
         $("#cambio_clave").hide();
         $("#mis_datos_personales").hide();
         
    });

});

