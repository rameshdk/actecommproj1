<?php
//die($_POST['imgpath']);
$fprodpage=fopen($_POST['pageurl'],'w');
$imgpath=$_POST['imgpath'];
$content="<html><head><style>imgdiv {float:left}</style></head><body>
$content="<div id='imgdiv'>";
$content.="<img src=";
$content.="\"../images/$imgpath\"";
$prodname=$_POST['prodname'];
$content.=">$prodname</img>";
$content=$content."</div>";
$proddescr=$_POST['proddescr'];
$content=$content."<div id='proddescr'>$proddescr</div>";
$content.="</body></html>"
fwrite($fprodpage,$content);
fclose($fprodpage);
?>
