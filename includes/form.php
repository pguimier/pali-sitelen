<head>
  <link rel="stylesheet" href="assets/style.css" />
</style>
<script type="text/javascript" src="assets/script.js"></script>
</head>
<body>
<form name="myForm" action="./" method="get" target="_new">
<textarea name="m" class="lp0" placeholder="sina pilin seme ?" rows="3" cols="80" onBlur="sitelenSin()" onKeypress="walolipu(event, this)"></textarea><br/>
<b class='lp'>linja suli</b><input type="range" min="2" max="50" value="16" class="pokanimi" name="s" onChange="sitelenSin()"/><br/>
<b class='lp'>kule sitelen</b><select name="c" class="pokanimi" onChange="sitelenSin()">
          <option value="000000" selected="selected">pimeja</option>
          <option value="FF0000">loje</option>
          <option value="FFCCCC">loje walo</option>
          <option value="00FF00">laso kasi</option>
          <option value="CCFFCC">laso kasi walo</option>
          <option value="0000FF">laso sewi</option>
          <option value="CCCCFF">laso sewi walo</option>
          <option value="AAAAAA">pimeja walo walo</option>
          <option value="999999">pimeja walo</option>
          <option value="666666">pimeja pimeja walo</option>
          <option value="333333">pimeja pimeja pimeja walo</option>
          <option value="FFFFFF">walo</option>
</select><br/>
<b class='lp'>kule monsi</b><select name="b" class="pokanimi" onChange="sitelenSin()">
          <option value="000000">pimeja</option>
          <option value="FF0000">loje</option>
          <option value="FFCCCC">loje walo</option>
          <option value="00FF00">laso kasi</option>
          <option value="CCFFCC">laso kasi walo</option>
          <option value="0000FF">laso sewi</option>
          <option value="CCCCFF">laso sewi walo</option>
          <option value="AAAAAA">pimeja walo walo</option>
          <option value="999999">pimeja walo</option>
          <option value="666666">pimeja pimeja walo</option>
          <option value="333333">pimeja pimeja pimeja walo</option>
          <option value="FFFFFF" selected="selected">walo</option>
</select><br/>
<select name="f" class="alanimi" onChange="sitelenSin()">
<?php
   $data_dir_obj = dir ("plugins");
   while ($listfonts[] = $data_dir_obj->read());
   sort($listfonts);
   $data_dir_obj->close();
   foreach($listfonts as $font)
   {
    if(is_file("plugins/".$font."/params.json"))
    {
     $fontparams = json_decode ( file_get_contents ( "plugins/".$font."/params.json" ) );
    }
    else continue;
    if($font=="linjapona") $select=" select='select'";
    else $select="";
    print '<option value="'.$font.'" $select>'.$fontparams->name.'</option>'."\n";
   }

?>

</select><br/>
<br/>
<input type="image" src="./?m=+" id="sitelen"/>
</form>

</body>