$(document).ready(function(){
    $("#leer").click(function(e){
        e.preventDefault(); // Prevenir el comportamiento predeterminado del enlace
        
        // Realizar la solicitud AJAX
        $.ajax({
            url: "nosotros.html", // URL del archivo HTML con la información adicional
            type: "GET",
            // dataType: "html", // Tipo de datos que esperamos recibir
            success: function(data) {
                // Actualizar el contenido de la sección "Sobre nosotros" con la información recibida
                $("#about").html(data);
            },
            error: function(xhr, status, error) {
                console.error("Error al cargar el contenido adicional:", error);
            }
        });
    });
});