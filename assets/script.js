
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
function walolipu(e)
{
      var code = (e.keyCode ? e.keyCode : e.which);
      if (code==0 || code == 32|| code == 13) {
        sitelenSin();
      }
}