$(document).ready(function () {
    if ($("#Retour").is(':checked')) {
            $(".TerugCl").fadeIn();
        }
    $("#Retour").on('click', function () {
        if ($(this).is(':checked')) {
            $(".TerugCl").fadeIn();
            document.getElementById("Terug").required = true;
        } else if ($(this).is(':not(:checked)')) {
		  $(".TerugCl").fadeOut();
            document.getElementById("Terug").required = false;
            
	   }
	   


    });
});