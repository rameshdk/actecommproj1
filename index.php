<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bootstrap Navbar Example</title>
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/imgoverlay.css" rel="stylesheet">
	<link href="css/flexgrid1.css" rel="stylesheet">

<style>
:root{
	--noofcolumns:6;
	--imgtextsize:20px;
}
 #footer {
	 float:clear both;
 }
  .menu, .login, .ads {	
	//background-color:yellow;
	border: solid 1px red;
  }
  .nav{
	  background-color:lightgray;  
  }
  .menu
  {
	background-color:orange;  
  }
  #divcontent
  {
	background-color:yellow;  
  }
  .ads{
	  background-color:orange;
  }
  .image1div {
	 position:relative;
	// padding:5px 0px 5px 0px;
  }
  .image1div:hover  span ,.image1div a span:hover{
  	  position:absolute;
	  color:darkviolet;
	  font-weight:bold;
	  font-size:calc(30/var(--nocolumns))px;	
	  top:75%;
	  transition:opacity 2s;
	  transition:font-size 0s;
	  opacity:1.0;
  }
  .image1div span
  {
	  //position:relative;
	 position: absolute;
	  top:75%;
//	  font-size:calc(30/var(--nocolumns))px;
	  opacity:0.9;
  }
  .image1div{
	  
  }
  .image1div:hover
  {
	  transition:opacity .8s;
  }
  /*
  .imagetext(
	font-size:20;
    z-index:2;
  }
  */
  .imageclass1
  {
//	  width:50px;
  }
  
 
  .col-sm-1-5,.col-sm-3-5, .col-sm-8-5 {
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}

@media (min-width: 768px) {
    .col-sm-1-5,.col-sm-3-5, .col-sm-8-5 {
        float: left;
    }
	.col-sm-1-5 {
		width:12.5%;
	}
	body .imageclass8
	{
		width:50px;
		--imgtextsize:8px;
	}
    .col-sm-3-5 {
        width: 29.16666667%;
    }
    .col-sm-8-5 {
        width: 70.83333333%;
    }
}

  .col-md-1-5,.col-md-3-5, .col-md-8-5 {
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}

@media (min-width: 961px) {
    .col-md-1-5,.col-md-3-5, .col-md-8-5 {
        float: left;
    }
	.col-md-1-5{
		width:12.5%;
	}
    .col-md-3-5 {
        width: 29.16666667%;
    }
    .col-md-8-5 {
        width: 70.83333333%;
    }
}

/*
.col-sm-1-5{
	.make-sm-column(2.0);
}*/
</style>

	
	
</head>

<body class="mystyle" onload="refreshpage()" onunload="javascript:alert('unloading');" onresize="onresizewnd()">
	<!-- jQuery (necessary for Bootstrap’s JavaScript plugins) -->
	<script src="js/jquery.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>

	<!--	nav bar starts here -->
	<nav class="navbar navbar-default">
	<div class="container">
	<!-- Brand and toggle get grouped for better mobile display -->
	
	<div class="navbar-header">
	
	<!--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-  -
	target="#bs-example-navbar-collapse-1" aria-expanded="false">
	<span class="sr-only">Toggle navigation</span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	</button>-->  
	<a class="navbar-brand" href="#">EComm</a>
	</div>
	
	
	<!-- Collect the nav links, forms, and other content for toggling -->
	
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	<ul class="nav navbar-nav">
	<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
	
	<li><a href="#">Link</a></li>
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-  -
		haspopup="true" aria-expanded="false">Categories <span class="caret"></span></a>
			
			<ul class="dropdown-menu">
			<?php 
				$conn = mysqli_connect("localhost:3306", "admin1", "ramesh", "actecomm1");
				$sql="SELECT * FROM categories WHERE hasparentcat='false'";
				$retval = mysqli_query($conn, $sql);
					if(!$retval) {
					   die("Failed to fetch record");
					} else {
					   // if records are there
					   while($row=mysqli_fetch_array($retval, MYSQLI_NUM)) {
						//echo "<li><a href='./Products.php?catid=".$row[0]."'>".$row[1]."</a></li>";
						echo "<li><a onclick=showproducts($row[0]) href='#'>".$row[1]."</a></li>";
					   }
					}
				   mysqli_free_result($retval);
				   mysqli_close($conn);
   
			?>
			</ul>
			<!-- <ul class="dropdown-menu">
			<li><a href="#">Action</a></li>
			<li><a href="#">Another action</a></li>
			<li><a href="#">Something else here</a></li>
			<li role="separator" class="divider"></li>
			<li><a href="#">Separated link</a></li>
			<li role="separator" class="divider"></li>
			<li><a href="#">One more separated link</a></li>
			</ul> -->
	</li>
	</ul>
	<form  class="navbar-form navbar-left" role="search">
	<div class="form-group">
	<input type="text" class="form-control" id="SearchTerm" placeholder="Search">
	</div>
	<button type="button" onclick="showproducts2()" >Submit</button>
	<!--<button type="button" onclick="showproducts2()" class="btn btn-default">Submit</button>-->
	</form>
	<ul class="nav navbar-nav navbar-right">
	<li><a href="#">Link</a></li>
	
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-  -
	haspopup="true" aria-expanded="false">User <span class="caret"></span></a>
	<ul class="dropdown-menu">
	<li><a href="index.html">Login</a></li>
	<li><a href="#">New User</a></li>
	<li><a href="#">Settings</a></li>
	<li role="separator" class="divider"></li>
	<li><a href="#">Logout</a></li>
	</ul>
	</li>
	</ul>

	</div ><!-- /.navbar-collapse -->
	</div ><!-- /.container-fluid -->
	</nav>
	<!--    nav bar ends here   -->
	
	<div class="container-fluid">
		<div class="row">
		 <div class="col-xs-12 col-sm-3 col-md-3 menu">
			<h4>Categories</h4>
			<?php 
				require "./Categories.php";
			?>
		 </div>
		 <div  class="col-xs-12 col-sm-6 col-md-6 login">
			<div class="row" id="divcontent">	
		    <!--<form method="post" action="./Login.php">
			<fieldset>
			 <legend>Login Form</legend>
			 <table class="table table-hover"> 
			  <tr>
			   <th>Username</th>
			   <td><input type="text" name="uname"/></td>
			  </tr>
			  <tr>
			   <th>Password</th>
			   <td><input type="password" name="pass"/></td>
			  </tr>
			  <tr>
			   <th><input type="submit" name="submit" value="Login"/></th>
			   <td><input type="reset" name="reset" value="Clear"/></td>
			  </tr>
			 </table>
             <p align="right"><a href="NewUser.html">New User</a></p>
			</fieldset>
			</form> -->
			</div><!--end of div row-->
		 </div>
		 <div class="col-xs-12 col-sm-3 col-md-3 ads">
			<h4>ads come here</h4>
		 </div>
		</div>
	</div>
	
	<div id="footer">
	<table>
		<th>About us &nbsp&nbsp&nbsp   </th>
		<th>Help   </th>
		<tr>
			<td></td>
			<td><a>Your account</a></td>
		</tr>
		<tr>
			<td></td>
			<td><a>Your orders</a></td>
		</tr>
	</table>
</br><p>&copy Activenet Informatics </p>
</div>
</body>
	<script defer>
	var firsttime=true;
	var nocolumns=8;
	var divcontentwidth=100;
	var widthlow=false;
	var rtime;
	var timeout = false;
	var delta = 1000;
	var debugging=false;
	var debuggingnew=false;
	var debuggingnew2=false;
	var debuggingnew3=false;
	var pixpercolumn=75;
	if(debuggingnew)alert("initialized globals");
	resetnavigatedaway();
	sessionStorage.setItem("firsttime",true);
	sessionStorage.setItem("nocolumns",12);
	sessionStorage.setItem('divcontentwidth',400);
	
	
	
	if(getdivcontentwidth()<pixpercolumn)
	{
		widthlow=true;
		sessionStorage.setItem('lowwidth',true);
	}
	else
	{
		widthlow=false;
		sessionStorage.setItem('lowwidth',false);
	}

	function initglobals()
	{
	firsttime=true;
	nocolumns=8;
	divcontentwidth=100;
	widthlow=false;
	rtime;
	timeout = false;
	delta = 1000;
	debugging=false;
	debuggingnew=true;

	}
	
	function resizemaindivs()
	{
		return;
		var elemmenu=document.getElementsByClassName("menu")[0];
		var elemads=document.getElementsByClassName("ads")[0];
		
		var firstclass=elemmenu.className.split(" ")[1];
		getdivcontentwidth("login");
		dbgdivcontentwidth=divcontentwidth;
		var newwidth=divcontentwidth+"px";sm
		if(divcontentwidth<700 && firstclass=="col-md-3")
		{
//			elemmenu.style.setProperty("width",newwidth);
//			elemads.style.setProperty("width",newwidth);	
//			elemmenu.className="col-sm-12 col-md-3 menu";
//			elemads.className="col-sm-12 col-md-3 ads";
//			refreshpage();
		}
		else
		{
//			elemmenu.className="col-sm-12 col-md-3 menu";
//			elemads.className="col-sm-12 col-md-3 ads ";
//	
		}

	}
	
		function showproducts(catid){
			if(debuggingnew2)alert("Entered showproducts!!");
			
			if(debugging)alert("no coulmns in show products:"+nocolumns);
			//root.documentElement.style.setProperty('--noofcolumns', nocolumns);
			//alert("after");
			
			if(!(catid==0))
			{
				document.cookie = "catid" + "=" + catid + ";"
			}
			else
			{
			catid=0;	
//				return;
			}
//			alert("searched="+getCookie("searched"));
			
		if(getCookie("searched")==1&&catid==0)
			{
				if(debugging)alert("diverting to show products2");
				showproducts2();
	//			document.cookie = "searched" + "=" + "0" + ";"
				return;
			}
		
      var display = document.getElementById("divcontent");
      var xmlhttp = new XMLHttpRequest();
	  //alert("calling products.php");
	  getdivcontentwidth("divcontentwidth");
      setnocolumns();
	  xmlhttp.open("GET", "Products.php?catid="+catid+"&nocolumns="+nocolumns);
	  //alert("Products.php?catid="+catid+"&nocolumns="+nocolumns);
	  
      xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xmlhttp.send();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
			//alert("ajax succeeded");
			//alert(this.responseText);
			display.innerHTML = this.responseText;
			//////////////////////////////////
			
			var rat=getdivcontentwidth("divcontentwidth")/nocolumns;
			var fontsz=Math.floor(rat/5);
			if(debugging)alert("font size in showproducts is :"+fontsz);
			//var fontsz=Math.floor(50/sessionStorage.getItem('nocolumns'));
			//fontsz=Math.floor((fontsize/3)*log(fontsz))
			var strfsz=fontsz+"px";

			//////////////////////////////////// 
		  	//var fontsz=Math.floor(100/nocolumns);
			//var strfsz=fontsz+"px";

			//alert(strfsz);
        	var res=document.getElementsByClassName("imagetext");
			for(var i=0;i<res.length;i++)
			{
				res[i].style.setProperty('font-size',strfsz);
			}
					var cols=document.getElementsByClassName("col-sm-1-5");
		for(var i=0;i<cols.length;i++)
		{
//			cols[i].style.setProperty(width,"12.5%");
		}
		getdivwidth("divcontentwidth");
		//setnocolumns();
		setcolwidths();
        } else {
          display.innerHTML = "Loading...";
        };
      }
	  setCookie("searched",0,1);
	  var fontsz=Math.floor(30/nocolumns);
	  var strfsz=fontsz+" px";
	  
	/*  if (this.readyState === 4 && this.status === 200)
	  {
		  alert(strfz);
		getElementsByClass("imagetext").style.fontSize=strfsz;
	  
	  }*/
	  
	  
    }
		function showproducts2(){
		if(debuggingnew2)alert("Entered showproducts2");
		//document.cookie = " searched" + "=" + "1" + ";"
		
		if(debugging)alert("no coulmns in show products 2:"+nocolumns);
		setCookie("searched",1,1);
		setCookie("catid",0,1);
		var display = document.getElementById("divcontent");
      var xmlhttp = new XMLHttpRequest();
	  var searchterm= document.getElementById("SearchTerm").value;
//	  alert("search termis:"+searchterm);
		
	  //getdivcontentwidth();
	  //setnocolumns();
	  
	  if(debugging)alert("divcontentwidth:"+divcontentwidth);
	  if(nocolumns<3)
	  {
		//setdivcontentwidth(400);  
		setnocolumns();
	  }
	  else
	  {
		 // getdivcontentwidth();
		  if(debugging)alert("showproducts2 got width :"+divcontentwidth);
		  setnocolumns();
	  }
	  
	  if(debugging)alert("no coulmns in show products 2 after call to setcolumns:"+nocolumns);
	  if(debuggingnew)alert("no columns!!!!!! :"+nocolumns);
      xmlhttp.open("GET", "Productslist.php?SearchTerm="+searchterm+"&nocolumns="+nocolumns);
      xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xmlhttp.send();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
			if(debugging)alert("ajax succeeded");
			if(debugging)alert(this.responseText);
			display.innerHTML = this.responseText;
			resizemaindivs();
			//////////////////////
			var prevdivcontentwidth=divcontentwidth;
			if(prevdivcontentwidth!=getdivcontentwidth("login"))
			{
				refreshpage();
				return;
			}

			var rat=getdivcontentwidth("divcontentwidth")/nocolumns;
			var fontsz=Math.floor(rat/5);
			//if(debugging)alert("divwidth //is"+sessionStorage.getItem('divcontentwidth')+"nocolumns"+sessionStorage.getItem('nocolumns')+"font size in showproducts2 is //:"+fontsz);
			if(debuggingnew)alert("divwidth is"+divcontentwidth+"nocolumns"+nocolumns+"font size in showproducts2 is :"+fontsz);

			//var fontsz=Math.floor(50/sessionStorage.getItem('nocolumns'));
			//fontsz=Math.floor((fontsz/3)*Math.log(fontsz));
			if(debugging)alert("LOG font size in showproducts2 is :"+fontsz);
			var strfsz=fontsz+"px";

			/////////////////////
			


		 // 	var fontsz=Math.floor(100/nocolumns);
		//	var strfsz=fontsz+"px";

			//dbg vars over
			//alert(strfsz);
        	var res=document.getElementsByClassName("imagetext");
			for(var i=0;i<res.length;i++)
			{
				res[i].style.setProperty('font-size',strfsz);
			}
			/*
					var cols=document.getElementsByClassName("col-sm-1-5");
		for(var i=0;i<cols.length;i++)
		{
			cols[i].style.setProperty(width,"12.5%");
		}
		*/
		//getdivcontentwidth();
		//setnocolumns();
		
		
		setcolwidths();
		} else {
          display.innerHTML = "Loading...";
        };
      }
	/*  
	if (this.readyState === 4 && this.status === 200)
	{
		alert("s2 fontssize:"+strfsz);
	getElementsByClass("imagetext").style.fontSize=strfsz;
	}
	*/
    }
/*
		function genprodpg(pid){
			//alert("Entered showproducts");
      var display = document.getElementById("divcontent");
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.open("GET", "genprod.php?pid="+pid);
      xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xmlhttp.send();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
			//alert("ajax succeeded");
			//alert(this.responseText);
          display.innerHTML = this.responseText;
        } else {
          display.innerHTML = "Loading...";
        };
      }
    }
*/
	function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  var expires = "expires="+d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
	}
	function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function deleteCookie(name) { setCookie(name, '', -1); }

function deleteAllCookies() {
    var cookies = document.cookie.split(";");

    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
}


/*
$(window).resize(function() {
	alert("onresize");
    rtime = new Date();
    if (timeout === false) {
        timeout = true;
        setTimeout(resizeend, delta);
    }
});
*/

function onresizewnd()
{
	delta=200;
	if(debugging)alert("resize called with timeout:"+delta);
    rtime = new Date();
    if (timeout === false) {
        timeout = true;
        setTimeout(resizeend, delta);
    }
	//refreshpage();
}

function resizeend() {
	
    if (new Date() - rtime < delta) {
      setTimeout(resizeend, delta);
    } else {
	if(debugging)alert("resize end called!!!");
	timeout = false;
        getdivcontentwidth("login");
		if(debuggingnew)alert2("1 resize end divcontentwidth:"+divcontentwidth);
		//setdivcontentwidth(divcontentwidth);
		setnocolumns();
		if(debuggingnew)alert("2 resize end divcontentwidth:"+divcontentwidth);
		refreshpage();
	//	refreshpage();
    }               
}

function getdivwidth(par)
{
	if(debuggingnew2)alert("Entering getdivwidth");
		//getdivcontentwidth();
		//return;
		var ele;
		if(par=="divcontent")
			ele = document.getElementById("divcontent"); // Do not use #
		else
			ele = document.getElementsByClassName("login")[0];
		
		var eleStyle = window.getComputedStyle(ele);
/* Below is the width of ele */
		var eleWidth = eleStyle.width;
		var numberwidth=Number(eleWidth.replace('px',''));
		return(divcontentwidth=Math.floor(numberwidth));
		//alert("1:"+getdivcontentwidth());
}

function getdivcontentwidth(par) 
{
//	if(debuggingnew2)alert("Entering getdivcotentwidth");
	//var pixwidth=$("#divcontent").css("width");
	/*
	var pixwidth=document.querySelector("#divcontent").width;
	divcontentwidth=Number(pixwidth.replace('px',''));
	
	return divcontentwidth;
	*/
	//var bb = document.querySelector("#divcontent")
	var bb;
	if(par=="divcontent")
		bb = document.querySelector("#divcontent")
	.getBoundingClientRect();
	else
		bb = document.querySelector(".login")
	.getBoundingClientRect();

       var width = bb.right - bb.left;
	   
	   if(debuggingnew2)alert("returning divcontent width:"+width);
	   return(divcontentwidth=width);
}

function setnocolumns2()
{
	if(debuggingnew2)alert("Entering setnocolumns2");
	getdivcontentwidth("login");
	nocolumns=Math.ceil(divcontentwidth/pixpercolumn);
}

function setdivcontentwidth(divwidth,par)
{
	if(debuggingnew2)alert("Entering setdivcontentwidth");
	 var newwidth=divwidth+"px";
		if(par=="login")
			document.getElementsByClassName('login')[0].style.setProperty('width',newwidth);
		if(par=="divcontentwidth")
			document.getElementById("divcontent").style.setProperty('width',newwidth);
		if(par=="both")
		{
			document.getElementsByClassName('login')[0].style.setProperty('width',newwidth);
			document.getElementById("divcontent").style.setProperty('width',newwidth);
		}
		
}

function setnocolumns()
{
	    if(debuggingnew2)alert("setting no columns");
			
		//var ele = document.getElementById("divcontent"), // Do not use #
		
		var ele = document.getElementsByClassName("login"), // Do not use #
		eleStyle = window.getComputedStyle(ele[0]);

		var eleWidth = eleStyle.width;
		var numberwidth=Number(eleWidth.replace('px',''));
		var numWidth=Math.floor(numberwidth);
		numWidth=getdivcontentwidth("login");
	//	numWidth=divcontentwidth;
		if(debugging)alert("div width is :"+numWidth);
		
			if(numWidth<pixpercolumn || numWidth>1200)
			{
//			document.querySelector(".login").style.setProperty('min-width','300px');
//			document.querySelector(".login").style.width=document.querySelector("body").style.width-30;
			
				document.querySelector("#divcontent").style.setProperty('min-width','300px');
			//document.querySelector("#divcontent").style.setProperty('width',200);
			//document.getElementsByClassName('login')[0].style.setProperty('width','400px');
			//document.getElementsById('#divcontent').style.setProperty('width','400px');
			//setdivcontentwidth("login",400);
			sessionStorage.setItem('divcontentwidth',400);
			sessionStorage.setItem('nocolumns',6);
			//alert(document.querySelector(".style.getProperty('width'));
			//nocolumns=Math.floor(max(numWidth,71)/70);
			//var tmpwidth=document.querySelector("#divcontent").style.width;
			widthlow=false;
			nocolumns=6;
			
			/*
			var noiter=0;
			while((divcontentwidth=getdivcontentwidth("login"))<70&&noiter<100)
			{
				sleep(10);
				alert(noiter++);
			}
			*/
			nocolumns=Math.ceil(divcontentwidth/pixpercolumn);
			//divcontentwidth=400;
			/*
			var tmpwidth=document.getElementById('divcontent').style.width;
		//	alert("tmp width is:"+tmpwidth);
			tmpwidth=Number(tmpwidth.replace("px",""));
		//	alert("tmp width number is:"+tmpwidth);
			nocolumns=Math.floor(Number(tmpwidth)/70)+2;
		//	alert("nocolumns in refresh:"+nocolumns);
			sessionStorage.setItem('nocolumns',nocolumns);
			alert("width is :"+tmpwidth+"returningwith nocolumns:"+nocolumns);
			*/
			return;
		}
		
		//nocolumns=Math.floor(numWidth/70);
		nocolumns=Math.ceil(numWidth/pixpercolumn);
		//		alert("nocolumns:"+nocolumns);
		if(nocolumns<1)
			nocolumns=1;
		if(nocolumns>12)
			nocolumns=12;
		if(debugging)alert("no columns is"+nocolumns);
//		sessionStorage.setItem("nocolumns",nocolumns);
//		alert("setting no columns:"+nocolumns);
	
}

function resetdivwidth(par)
{
	if(debuggingnew2)alert("resetting div width");
	if(par=="login")
		document.getElementsByClassName("login")[0].style.setProperty('width','400px');
	if(par=="divcontentwidth")
		document.getElementById("divcontent").style.setProperty('width','400px');
	if(par=="both"){
		document.getElementById("divcontent").style.setProperty('width','400px');
		document.getElementsByClassName("login")[0].style.setProperty('width','400px');
	}
		
}

function navigatedaway()
{
	return sessionStorage.getItem('navigatedaway');
}
function setnavigatedaway()
{
	sessionStorage.setItem('navigatedaway',true);
	sessionStorage.setItem('divcontentwidth',divcontentwidth);
	sessionStorage.setItem('nocolumns',nocolumns);
}
function resetnavigatedaway()
{
	sessionStorage.setItem('navigatedaway',false);
}

function refreshpage()
{
		if(debuggingnew2)alert("in refreshpage ");
		firsttime=sessionStorage.getItem("firsttime");
		
		if(navigatedaway())
		{
			if(debuggingnew)alert("navigated");
			//divcontentwidth=sessionStorage.getItem('divcontentwidth');
			//setdivcontentwidth(divcontentwidth,"divcontentwidth");
			//resetnavigatedaway();
		}
		//if(!firsttime)	
		{
			getdivcontentwidth("login");
			setnocolumns();
		}
		if(widthlow)
		{
			if(debuggingnew)alert("resetting width!");
			//resetdivwidth("both");
			//setnocolumns();
			widthlow=false;
		}
		//	nocolumns=sessionStorage.getItem("nocolumns");
//		alert("in refreshpage no columns:"+nocolumns);
//		setnocolumns();
		if(debugging)alert("after call:"+nocolumns);
		
/*		
		var ele = document.getElementById("divcontent"), // Do not use #
		eleStyle = window.getComputedStyle(ele);
		var eleWidth = eleStyle.width;
		var numberwidth=Number(eleWidth.replace('px',''));
		var numWidth=Math.floor(numberwidth);
		
		alert(numWidth);
		if(firsttime)
		{
//		alert("adding event listener");
//		window.addEventListener('load',setcolwidths,false);
		firsttime=false;
		}
		nocolumns=Math.floor(numWidth/150);
		if(nocolumns<1)
			nocolumns=1;
		if(nocolumns>12)
			nocolumns=12;
*/		
		var cols=document.getElementsByClassName("col-sm-1-5");
	for(var i=0;i<cols.length;i++)
		{
			cols[i].style.setProperty(width,"12.5%");
		}
	//if(firsttime==false)
		{
//			setcolwidths();
		}
	//	else
	//		firsttime=false;
	
//    2if (!(document.cookie.indexOf("searched=") >= 0&&document.cookie.indexOf("catid=")>=0))
//		return;
	//alert("both cookies not set");
	//alert("searched="+getCookie("searched"));
	//alert("catid="+getCookie("catid"));
	//alert("Entered showproducts");
			if(getCookie("searched")==1)
			{
				if(debugging)alert("seach cookie present calling show products 2");
				showproducts2()
//				document.cookie = "searched" + "=" + "0" + ";"
				return;
			}
	  
			var catid=getCookie("catid");
			var searchterm=getCookie("searched");
	  if(catid==0&&searchterm==0)
	  {
		  if(debuggingnew2)alert("no search term or cat id returnng from refresh page");
		  return;
	  }
	  var display = document.getElementById("divcontent");
      var xmlhttp = new XMLHttpRequest();
      if(debugging)alert("not searched");
	  
	  setnocolumns();
	  if(debuggingnew2)alert("calling products.php catid:"+catid+"nocolumns:"+nocolumns+"divcontentwidth:"+divcontentwidth);
	  xmlhttp.open("GET", "Products.php?catid="+catid+"&nocolumns="+nocolumns);
      xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xmlhttp.send();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
			//alert("ajax succeeded");
			//alert(this.responseText);
			if(debuggingnew3) alert("getting category wise");
          display.innerHTML = this.responseText;
		 resizemaindivs();		
		  var prevdivcontentwidth=divcontentwidth;
		  if(prevdivcontentwidth!=getdivcontentwidth("login"))
		  {
			  refreshpage();
			  return;
		  }
		  	//var fontsz=Math.floor(100/nocolumns);/
			var rat=getdivcontentwidth("divcontentwidth")/nocolumns;
			var fontsz=Math.floor(rat/5);
			if(debuggingnew)alert("font size is :"+fontsz);
			//var fontsz=Math.floor(50/sessionStorage.getItem('nocolumns'));
			
			var strfsz=fontsz+"px";

			//dbg vars over
//			alert(strfsz);
        	var res=document.getElementsByClassName("imagetext");
			for(var i=0;i<res.length;i++)
			{
				res[i].style.setProperty('font-size',strfsz);
			}
			//getdivwidth();
			//setnocolumns();
		/* resizing main*/
		/*end  resiziing main divs*/	
			
			setcolwidths();
			
			firsttime=false;
        } else {
          display.innerHTML = "Loading...";
        };
      }
//setnocolumns();
 firsttime=false;
// sessionStorage.setItem('nocolumns',nocolumns);
}

function removecookies()
{
	alert("removing cookeis");
	deleteCookie("catid");
	deleteCookie("searched");
}

function settextfont()
{
			var elems=document.getElementsByClassName("imagetext");
		for(var i=0;i<elems.length;i++)
			elems[i].style.setProperty('font-size',Math.floor(150/nocolumns));

}

function setcolwidths()
{
	var listelems;
	var classnames;
	var widthelem=0;
	var percentval=0;
	
	if(debuggingnew2)alert("setting col widths");

	for(var j=1;j<13;j++)
	{
		listelems=document.getElementsByClassName("col-sm-"+j);
	//alert("col-sm-"+j);
	for(var i=0;i<listelems.length;i++)
	
	{
		classnames=listelems[i].classList;
		prclassname=classnames.item(1);	
		
		percentval=Number(prclassname[0]+"."+prclassname[1])*7.9;
		
		widthelem=percentval+"%";
		
	//	alert(widthelem);
		
		
		listelems[i].style.setProperty("width",widthelem);
	}
	}
}
	</script>

</html>