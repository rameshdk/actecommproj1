<?php
//die($_POST['imgpath']);

	$dbhost = "localhost:3306";
    $dbuser = "admin1";
	$dbpass = "ramesh";
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, "actecomm1");
   
	if(!$conn ) {
      die('Could not connect: ');
	} else {
		// echo 'Connected successfully<br/>';
	}

$sql="SELECT urldetails from products where pid=".$_POST['pid'];
$retval=mysqli_query($conn, $sql);
if(!$retval) {
		   echo(mysqli_error($conn));
		   die("Failed to fetch rows");
	}
	
$row=mysqli_fetch_array($retval);

$pageurl=NULL;
if(empty($_POST['pageurl']))
	$pageurl=$row[0];
else
	$pageurl=$_POST['pageurl'];	

$fprodpage=fopen($pageurl,'w');
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
if(!empty($_POST['pageurl']))
{
	$sql="UPDATE PRODUCTS SET URLDETAILS= "."\"$pageurl\""." WHERE pid=".$_POST['pid'];
	//die( $sql);
	$retval2=mysqli_query($conn, $sql);
	if(!$retval2) {
		   echo(mysqli_error($conn));
		   die("Failed to update record");
	}
	
}

mysqli_free_result($retval);
 mysqli_close($conn);
?>
