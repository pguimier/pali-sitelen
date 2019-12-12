<?php //encoding: utf-8


/* for linja pona */
function transform($text)
{
   include("nimi.php");
   $cleantxt=str_replace(array("!",",",":",";",".","?","-","+","/","\n"), " ", $text);
   $arr_txt=explode(" ", $cleantxt);
   foreach($arr_txt as $v)
   {
    $sep="\s,\.!\n\r";
    if(!empty($nimi[$v]))
    {
     $text=preg_replace("|([".$sep."])".$v."$|", "$1".unichr(hexdec($nimi[$v])), $text);//end of a line
     $text=preg_replace("|^".$v."([".$sep."])|", unichr(hexdec($nimi[$v]))."$1", $text);//beginning of a line
     $text=preg_replace("|([".$sep."])".$v."([".$sep."])|", "$1".unichr(hexdec($nimi[$v]))."$2", $text); //everything else
    }
   }
   $text=str_replace("  ",unichr(hexdec("E679")), $text);
   $text=str_replace(", ",unichr(hexdec("E680")), $text);
   $text=str_replace(". ",unichr(hexdec("E681")), $text);
   $text=str_replace(": ",unichr(hexdec("E682")), $text);
   $text=str_replace("! ",unichr(hexdec("E683")), $text);
   $text=str_replace("? ",unichr(hexdec("E684")), $text);
   return $text;
}


?>