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
	
	<script>
		function showproducts(catid){
			alert("Entered showproducts");
			
			if(!(catid==0))
			{
				document.cookie = "catid" + "=" + catid + ";"
			}
			else
			{
			catid=0;	
//				return;
			}
			alert("searched="+getCookie("searched"));
			
		if(getCookie("searched")==1&&catid==0)
			{
				showproducts2();
	//			document.cookie = "searched" + "=" + "0" + ";"
				return;
			}
		
      var display = document.getElementById("divcontent");
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.open("GET", "Products.php?catid="+catid);
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
	  setCookie("searched",0,1);
    }
		function showproducts2(){
			alert("Entered showproducts2");
		//document.cookie = " searched" + "=" + "1" + ";"
		setCookie("searched",1,1);
		setCookie("catid",0,1);
		var display = document.getElementById("divcontent");
      var xmlhttp = new XMLHttpRequest();
	  var searchterm= document.getElementById("SearchTerm").value;
	  alert("search termis:"+searchterm);
      xmlhttp.open("GET", "Productslist.php?SearchTerm="+searchterm);
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
function refreshpage()
{
		alert("in refreshpage");
//    if (!(document.cookie.indexOf("searched=") >= 0&&document.cookie.indexOf("catid=")>=0))
//		return;
	//alert("both cookies not set");
	//alert("searched="+getCookie("searched"));
	//alert("catid="+getCookie("catid"));
	//alert("Entered showproducts");
			if(getCookie("searched")==1)
			{
				showproducts2()
//				document.cookie = "searched" + "=" + "0" + ";"
				return;
			}
	  
			var catid=getCookie("catid");
			var searchterm=getCookie("searched");
	  if(catid==0&&searchterm==0)
		  return;
	  var display = document.getElementById("divcontent");
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.open("GET", "Products.php?catid="+catid);
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

function removecookies()
{
	alert("removing cookeis");
	deleteCookie("catid");
	deleteCookie("searched");
}

	</script>
</head>

<body onload="refreshpage()" onunload="javascript:alert('unloading');">
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
	
	<div class="container">
		<div class="row">
		 <div class="col-md-3 menu">
			<h4>Categories</h4>
			<?php 
				require "./Categories.php";
			?>
		 </div>
		 <div  class="col-md-6 login">
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
		 <div class="col-md-3 ads">
			<h4>ads comes here</h4>
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
<head>
 <style>
 #footer {
	 float:clear both;
 }
  .menu, .login, .ads {	
	//background-color:yellow;
	border: solid 1px red;
  }
  .nav{
	  background-color:pink;  
  }
  .menu
  {
	background-color:lightgreen;  
  }
  #divcontent
  {
	background-color:yellow;  
  }
  .ads{
	  background-color:lightgreen;
  }
  .image1div {
	 position:relative;
	// padding:5px 0px 5px 0px;
  }
  .image1div:hover  span ,.image1div a span:hover{
  	  position:absolute;
	  color:darkviolet;
	  font-weight:bold;
	  font-size:20px;	
	  top:40%;
	  transition:opacity 2s;
	  transition:font-size 0s;
	  opacity:1.0;
  }
  .image1div span
  {
	  position:relative;
	  top:40%;
	  font-size:15px;
	  opacity:0.9;
  }
  .image1div{
	  
  }
  .image1div:hover
  {
	  transition:opacity .8s;
  }
  
  .imagetext(
    z-index:2;
  }
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
		width:10%;
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
</html>