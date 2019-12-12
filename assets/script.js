
function sitelenSin()
{
	sitelen=document.getElementById("sitelen");
        sitsrc = "/?";
        inputs = document.forms["myForm"].elements;
        for (i = 0; i < inputs.length; ++i) {
            sitsrc = sitsrc + inputs[i].name +"=" + encodeURI(inputs[i].value) + "&";
        }
        sitelen.src = sitsrc;
}