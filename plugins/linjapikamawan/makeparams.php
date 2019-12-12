<?php //encoding: utf-8
$font = array(
	'filename'	=>	"linja-pi-kama-wan.ttf",
	'name'		=>	"linja pi kama wan pi jan Inkepa",
	'wordwidth'	=>	.5,
	'wordheight'	=>	14,
	'type'		=>	'regular',
	'script'	=>	false

);

file_put_contents("params.json", json_encode($font));

?>