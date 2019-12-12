<?php //encoding: utf-8
$font = array(
	'filename'	=>	"sitelen_luka_tu_tu.ttf",
	'name'		=>	"sitelen luka tu tu pi jan Inkepa",
	'wordwidth'	=>	.3,
	'wordheight'	=>	14,
	'type'		=>	'hyeroglyph',
	'script'	=>	true

);

file_put_contents("params.json", json_encode($font));

?>