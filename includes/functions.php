<?php //encoding: utf-8
/*
 * Convert unicode number to char
 */
function unichr($u) {
 return mb_convert_encoding('&#' . intval($u) . ';', 'UTF-8', 'HTML-ENTITIES');
}


?>