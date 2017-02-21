$(document).ready(function ()
{
	if ($("#Retour").is(':checked'))
	{
		$(".TerugCl").fadeIn();
	}
	setInterval(changeBackground, 5000);
	$(".PersVer").hide();
	$(".PersVer").required = false;
	$("#Retour").on('click', function ()
	{
		if ($(this).is(':checked'))
		{
			$(".TerugCl").fadeIn();
			document.getElementById("Terug").required = true;
		}
		else if ($(this).is(':not(:checked)'))
		{
			$(".TerugCl").fadeOut();
			document.getElementById("Terug").required = false;
		}
	});
});

function DatalistRemove()
{
	AantalDLE = document.getElementsByClassName("DLElement").length;
	var DL = document.getElementById("landen");
	VerwDLE = document.getElementById("Vertrek").value;
	var Op = document.getElementById("landen").options.namedItem(VerwDLE);
	DL.removeChild(Op);
}

function DatalistAdd()
{
	if (AantalDLE > document.getElementsByClassName("DLElement").length)
	{
		$("#landen").append("<option value=\"" + VerwDLE + "\" id=\"" + VerwDLE + "\"></option>");
	}
}

function CheckAantalPers()
{
	if (document.getElementById("Aantalpers").value == 1)
	{
		$(".PersVer").fadeOut();
		$(".PersVer").required = false;
	}
	else
	{
		$(".PersVer").fadeIn();
		$(".PersVer").required = true;
	}
}

function ValiPers()
{
	if((parseInt(document.getElementById("AantalVolw").value) + parseInt(document.getElementById("AantalKind").value) + parseInt(document.getElementById("AantalBaby").value)) < parseInt(document.getElementById("Aantalpers").value))
	{
		document.getElementById("Submit1").disabled = true;
	} else {
		document.getElementById("Aantalpers").value = (parseInt(document.getElementById("AantalVolw").value) + parseInt(document.getElementById("AantalKind").value) + parseInt(document.getElementById("AantalBaby").value));
		document.getElementById("Submit1").disabled = false;
	}
}

var imageIndex = 1;
var imagesArray = [
    "Fotos/Foto1.jpg",
    "Fotos/Foto2.jpg",
    "Fotos/Foto2.jpg"
];

function changeBackground(){
    var index = imageIndex++ % imagesArray.length;
    $("#Body").css({"background" : "url('"+ imagesArray[index] +"')" , "background-repeat" : "no-repeat" , "background-size" : "100vw 100vh"});
	
}