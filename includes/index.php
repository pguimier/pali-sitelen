<?php

class Sitelen{

   var $__version__ = '0.1';
   var $rootDir;
   var $font;
   var $fontfile;
   var $fontparams;
   var $size;
   var $color;
   var $background;
   var $width;
   var $height;

   function __construct( $rootDir , $get )
   {
//~       $this->rootDir = $rootDir;
      $this->rootDir = "./";
      // The text to draw
      if(!empty($get['m']))
      {
	 $this->text=$get['m'];
      }

      //define font
      if(!empty($get['f'])) $this->font=$get['f'];
      else $this->font="linjapona";
      if(!is_file( $this->rootDir . "plugins/" . $this->font . "/params.json" )) die( "no font params.json file found" );
      $this->fontparams = json_decode ( file_get_contents ($this->rootDir . "plugins/" . $this->font . "/params.json" ) );
      if(!is_file( $this->rootDir . "plugins/" . $this->font . "/" . $this->fontparams->filename)) die("no font file found");
      $this->fontfile = $this->rootDir . "plugins/" . $this->font . "/" . $this->fontparams->filename;

      //define size
      if(!empty($get['s'])) $this->size=$get['s'];
      else $this->size=16;


      //define font color
      if(!empty($get['c'])) $this->color=$get['c'];
      else $this->color="000000";

      //define background color
      if(!empty($get['b'])) $this->background=$get['b'];
      else $this->background="ffffff";


   }


   /*
    * Define size of the image
    */
   private function sitelenSuliSeme()
   {
      if($this->fontparams->wordwidth) $wordwidth=$this->fontparams->wordwidth;
      else $wordwidth=.7;
      if($this->fontparams->wordheight) $wordheight=$this->fontparams->wordheight;
      else $wordheight=14;
      $textlines=explode("\n", $this->text);
      $maxlen=1;
      foreach($textlines as $v) if(strlen($v)>$maxlen)$maxlen=strlen($v);
      $this->width = $this->size * $maxlen * $wordwidth;
      $this->height = ($this->size + $wordheight) * count($textlines);
   }

   public function tawa()
   {

      //get size of image
      $this->sitelenSuliSeme();

      // Create the image
      $im = imagecreatetruecolor($this->width, $this->height);

      // Create some colors
      $foreground_set = imagecolorallocate($im, hexdec(substr($this->color, 0, 2)), hexdec(substr($this->color, 2, 2)), hexdec(substr($this->color, 4, 2)));
      $black = imagecolorallocate($im, 0, 0, 0);

      if($this->background)
      {
       $background_set = imagecolorallocate($im, hexdec(substr($this->background, 0, 2)), hexdec(substr($this->background, 2, 2)), hexdec(substr($this->background, 4, 2)));
       imagefilledrectangle($im, 0, 0, $this->width-1, $this->height-1, $background_set);
      }
      else imagecolortransparent($im, $black);

      //text transformations
      if($this->fontparams->script && is_file( $this->rootDir . "plugins/" . $this->font . "/script.php" ))
      {
	 include($this->rootDir . "plugins/" . $this->font . "/script.php");
	 $this->text = transform($this->text);
      }

      // Add the text
      imagettftext($im, $this->size, 0, 1, $this->size + 4, $foreground_set, $this->fontfile, $this->text);

      // Set the content-type
      header('Content-Type: image/png');

      imagepng($im);
      imagedestroy($im);

   }
}



//define image size
/*


   if($font==1 ) $wordwidth=.35;
   else if($font==2 ||$font==3) $wordwidth=.3;
   else if($font==4) $wordwidth=.4;
   else if($font==8) $wordwidth=.5;
   else if($font==9) {$wordwidth=.55;$wordheight=30;}
   else if($font==5||$font==6) $wordwidth=.85;
   else if($font==7) {$wordwidth=.85;$wordheight=18;}
   else $wordwidth=.7;
   // Setting text with choosen font
   if($font==1) include("linjapona.php");
   else if($font==2) include("linjaleko.php");
   else if($font==3) include("sitelenlukatutu.php");
   else if($font==4) include("tokiponawesi.php");
   else if($font==5) $font = './fonts/linja-pi-kute-mute.ttf';
   else if($font==6) $font = './fonts/linja-pi-kute-mute-tu.ttf';
   else if($font==7) $font = './fonts/linjasikepikutemute-Regular.ttf';
   else if($font==8) $font = './fonts/linja-pi-kama-wan.ttf';
   else if($font==9) $font = './fonts/TokiTengwar.ttf';
   else $font = './fonts/arial.ttf';


*/



?>
