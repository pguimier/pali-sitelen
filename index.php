<?php //encoding: utf-8
/**
 * This file is part of pali sitelen project.
 * It's copyrighted by the contributors recorded
 * in the version control history of the file, available from the following
 * original location:
 *
 * <https://github.com/pguimier/pali-sitelen/blob/master/index.php>
 *
 * SPDX-License-Identifier: MIT
 * License-Filename: LICENSE
 */

ini_set('display_errors', '1');
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);

define('WEBROOT',str_replace('index.php','',$_SERVER['SCRIPT_NAME']));
define('ROOT',str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));

//loading form or..
if(count($_GET) < 1) {
	include(ROOT."includes/form.php");
	exit;
}

//Loading app
require_once(ROOT."includes/index.php");
require_once(ROOT."includes/functions.php");


// instance pali-sitelen
$sitelen = new Sitelen(
    WEBROOT,    // root dir
    $_GET // url params
);

// run app
echo $sitelen->tawa();

?>