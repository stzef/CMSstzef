$("#appbundle_cmsstzefpages_idTypePage").change(function (event) {
	$("#appbundle_cmsstzefpages_articleToShow").prop('disabled', true).closest(".form-group").hide()
	$("#appbundle_cmsstzefpages_categoryToShow").prop('disabled', true).closest(".form-group").hide()
	$("#form_idBanner").prop('disabled', true).closest(".form-group").hide()
	$("#form_urlFile").prop('disabled', true).closest(".form-group").hide()
	if ( $(this).val() == 1 ){
		/*Articulos por Categoria*/
		$("#appbundle_cmsstzefpages_categoryToShow").prop('disabled', false).closest(".form-group").show()
	}
	if ( $(this).val() == 2 ){
		/*Solo un Articulo*/
		$("#appbundle_cmsstzefpages_articleToShow").prop('disabled', false).closest(".form-group").show()
	}
	if ( $(this).val() == 3 ){
		/*Archivo*/
		$("#form_urlFile").prop('disabled', false).closest(".form-group").show()
	}
	if ( $(this).val() == 4 ){
		/*Galeria*/
		$("#form_idBanner").prop('disabled', false).closest(".form-group").show()
	}
	if ( $(this).val() == 5 ){
		/*Formulario de Contacto*/
	}
	if ( $(this).val() == 9 ){
		/*Galeria*/
		$("#form_idBanner").prop('disabled', false).closest(".form-group").show()
	}
	if ( $(this).val() == 10 ){
		/*Galeria*/
		$("#form_idBanner").prop('disabled', false).closest(".form-group").show()
	}
})
$( document ).ready(function(event){
	$("#appbundle_cmsstzefpages_idTypePage").trigger("change")
})
