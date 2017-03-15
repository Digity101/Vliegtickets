$(document).ready(function ()

                  {
    if ($("#Retour").is(':checked'))
    {
        $(".TerugCl").fadeIn();
    }
    if(window.location.pathname == '/'){
        setInterval(changeBackground, 10000);
    }
    $(".PersVer").hide();
    $(".PersVer").required = false;
    document.getElementById("Terug").min = document.getElementById("DatumVLuchtheen").value;
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

    if((parseInt(document.getElementById("AantalVolw").value) + parseInt(document.getElementById("AantalKind").value) + parseInt(document.getElementById("AantalBaby").value)) != parseInt(document.getElementById("Aantalpers").value))
    {
        document.getElementById("Submit1").disabled = true;
    } else {
        document.getElementById("Submit1").disabled = false;
    }
}

function MinTerug(){
    document.getElementById("Terug").min = document.getElementById("DatumVLuchtheen").value;
}

var FotoLoc = 1;

function changeBackground(){
    $("#RO" + FotoLoc).animate({left:"100vw"},600);
    $("#RO" + FotoLoc).animate({left : "70vw", top : "100vh"}, 0);
    if(FotoLoc == 3){
        FotoLoc = 1;
    } else {
        FotoLoc++;
    }
    $("#Body").css({"background" : "url('Fotos/Foto"+ FotoLoc +".jpg')" , "background-repeat" : "no-repeat" , "background-size" : "100vw 100vh", "background-attachment" : "fixed"});
    $("#RO" + FotoLoc).animate({top:"80vh"},400);
}

$( document ).ready(function() {
var inputs = document.querySelectorAll('input[list]');
for (var i = 0; i < inputs.length; i++) {
  inputs[i].addEventListener('change', function() {
    var optionFound = false,
      datalist = this.list;
    for (var j = 0; j < datalist.options.length; j++) {
        if (this.value == datalist.options[j].value) {
            optionFound = true;
            break;
        }
    }
    if (optionFound) {
      this.setCustomValidity('');
    } else {
      this.setCustomValidity('Kies alstublieft iets van de suggesties');
    }
  });
}
});
