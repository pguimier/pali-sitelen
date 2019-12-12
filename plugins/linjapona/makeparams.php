<?php //encoding: utf-8
$font = array(
	'filename'	=>	"linjapona3-5OTF.ttf",
	'name'		=>	"linja pona pi jan Same",
	'wordwidth'	=>	.35,
	'wordheight'	=>	14,
	'type'		=>	'hyeroglyph',
	'script'	=>	true

);

file_put_contents("params.json", json_encode($font));

?>