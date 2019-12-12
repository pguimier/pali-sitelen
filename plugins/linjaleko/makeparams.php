<?php //encoding: utf-8
$font = array(
	'filename'	=>	"linja_leko.ttf",
	'name'		=>	"linja leko pi jan Selano",
	'wordwidth'	=>	.3,
	'wordheight'	=>	14,
	'type'		=>	'hyeroglyph',
	'script'	=>	true

);

file_put_contents("params.json", json_encode($font));

?>