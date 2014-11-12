/*
Hemos de poner el prefijo "ir_" antes de las variables, id's, etc. para evitar conflictos
*/

//plugin de jQuery para cargar una imagen mediante AJAX. Crea un elemento <img> dentro del contenedor desde el que se invoca.
//uso: $("#container").image("http://jquery.com/images/hat.gif")
//uso con callback (cuando se ha cargado la imagen): $("#container").image("http://jquery.com/images/hat.gif",function(){   alert("Image OK !");  });
$.fn.cargar_imagen = function(src, f) {
	return this.each(function() {
		$(this).html('');
		$("<img />").appendTo(this).each(function(){
			this.src = src;
			this.onload = f;
		});
	});
}

//muestra la imagen de previsualización en el contenedor adecuado. Mientras carga, muestra el GIF de carga
function ir_previsualizar(id_cont_previs, id_nodo_imagen) {
	jQuery('#ir_gif_cargando').show();
	
	jQuery('#' + id_cont_previs).cargar_imagen(ir_ibpath + '/' + id_nodo_imagen + '/thumbnail', function(){
		jQuery('#ir_gif_cargando').hide();
	});
	jQuery('#ir_txt_ninguna').hide();
	jQuery(".ir_bt_quitar").show();
}

jQuery(document).ready(function() {
	var ir_id_origen;
	
	//si hay una imagen seleccionada con anterioridad, mostrarla
	var ir_id_actual = jQuery("#ir_id_imagen").val();
	if(jQuery("#ir_id_imagen").val() != '') {
		ir_previsualizar('ir_previsual', ir_id_actual);
	}
	
	window.SetUrl = function ( url_imagen, width, height, alt ) {
		arr_url = url_imagen.split('/');
		id_nodo_imagen = arr_url[(arr_url.length - 2)];
		nombre_preset = arr_url[(arr_url.length - 1)];
		origen_preset = arr_url[(arr_url.length - 3)];
		
		//previsualizamos
		ir_previsualizar('ir_previsual', id_nodo_imagen);
		
		//actualizamos los inputs del control
		jQuery('#ir_id_imagen').val(id_nodo_imagen);
		jQuery('#ir_nombre_preset').val(nombre_preset);
		jQuery('#ir_origen_preset').val(origen_preset);
		
		//actualizamos descripción
		var titulo_imagen = alt;
		var descripcion = '(' + width + ' x ' + height + ' px) (' + nombre_preset + ')';
		jQuery('#ir_img_titulo').html(titulo_imagen);
		jQuery('#ir_img_desc').html(descripcion);
	}

	//Permitimos a IB establecer los valores de algunos inputs
	window.GetE = function(id_element) {
		switch(id_element) {
			case 'txtLnkUrl':
				return jQuery('#ir_img_link_url')[0];
				break;
				
			case 'cmbLnkTarget':
				//aprovechamos el que se llame a este case luego de haber establecido en valor de txtLnkUrl para completar la descripción
				ir_img_link_url = jQuery('#ir_img_link_url').val();
				if((ir_img_link_url != '') && ((jQuery('#ir_img_desc').html()).indexOf('ir_link') == -1)) {
					jQuery('#ir_img_desc').append(' (<a href="' + ir_img_link_url + '" id="ir_link">Link</a>)');
				}
				
				return jQuery('#ir_img_link_target')[0];
				break;
			
			default:
				//esto está sucediendo... pero ni idea de qué trae XD
				return null;
				break;
		}
	}

	jQuery(".ir_bt_selecc").click(function(){
			ir_id_origen = jQuery(this).attr("id");
			popupWin = window.open("index.php?q=imagebrowser/view/browser&app=image_ref", "ventana_ib",
			"status, scrollbars, resizable, dependent, width=680, height=439, left=0, top=0");
	});
	
	jQuery(".ir_bt_quitar").click(function(){
		jQuery('#ir_previsual').html('');
		jQuery('#ir_txt_ninguna').show();
		jQuery('#ir_gif_cargando').hide();
		jQuery('#ir_img_desc').html('');
		jQuery('#ir_img_titulo').html('');
		
		jQuery("#ir_id_imagen").val('');
		jQuery('#ir_nombre_preset').val('');
		jQuery('#ir_origen_preset').val('');
		
		jQuery(this).hide();
	});
});