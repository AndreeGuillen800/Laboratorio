$(document).ready(function(){

    $("#cambiarclave").click(function(){
         $("#titulo").hide();
         $("#mis_datos_personales").hide();
         $("#cambio_clave").toggle(2000);
         $("#busqueda_deportista").hide();
         $("#busqueda_deportista_2").hide();
         $("#busqueda_deportista_estadistica").hide();  
    });

   $("#datospersonales").click(function(){
         $("#titulo").hide();
         $("#cambio_clave").hide();
         $("#busqueda_deportista_2").hide();
         $("#busqueda_deportista").toggle(2000);
         $("#busqueda_deportista_estadistica").hide();    
        // $("#mis_datos_personales").toggle(2000);
    });

///////////////////////////////////////////////
    $("#buscardeportista").click(function(){
         $("#titulo").hide();
         $("#cambio_clave").hide();
         $("#busqueda_deportista_2").hide();
         $("#busqueda_deportista").hide();
         $("#mis_datos_personales").hide();
         $("#busqueda_deportista_estadistica").toggle(2000);  
    });
    $("#definirentrenamiento").click(function(){
         $("#titulo").hide();
         $("#cambio_clave").hide();
         $("#busqueda_deportista_2").toggle(2000);
         $("#mis_datos_personales").hide();
         $("#busqueda_deportista").hide();
         $("#busqueda_deportista_estadistica").hide();  
    });

});
