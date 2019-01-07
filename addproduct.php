<?php
//die($_POST['imgpath']);
$fprodpage=fopen($_POST['pageurl'],'w');
$imgpath=$_POST['imgpath'];
$content="<html><head><style>imgdiv {float:left}</style><script>
</script></head><body>";
$content="<div id='imgdiv'>";
$content.="<img src=";
$content.="\"../images/$imgpath\"";
$prodname=$_POST['prodname'];
$content.=">$prodname</img>";
$content=$content."</div>";
$proddescr=$_POST['proddescr'];
$content=$content."<div id='proddescr'>$proddescr</div>";
$content.="</body></html>";
//die($_POST['pid']);
$actionpart="addtocart.php?pid=".$_POST['pid'];
//$actionpart="addtocart.php?pid=23";
$content.="<form method='GET' action='$actionpart'  >Quantity<input type='text' name='quantity'></input><input type='submit'  name='addtocart' value='add to cart'></input></form>";
fwrite($fprodpage,$content);
fclose($fprodpage);
?>
