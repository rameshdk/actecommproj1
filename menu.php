<html>
<head>
	<meta charset="utf-8">
	<title>Bintu Online Bazar</title>
	<style>
	img {
		max-width:180px;
		max-height:200px;
		width:auto;
		height:auto;
	}
	ol, ul {
		list-style: none;
	}
	nav {
		height: 30px;
		border-bottom: 5px solid white;
	}
	.nav {
		margin: 0 auto;
		width: 600px;
	}
	.nav a {
		display: block;
		text-decoration: none;
	}
	.nav > li {
		float: left;
		margin-right: 5px;
	}
	.nav > li > a {
		height: 34px;
		line-height: 34px;
		padding: 0 20px;
		font-weight: bold;
		color: white;
		text-decoration: none;
		border-radius: 3px 3px 0 0;
		background-color: blue;
	}
	.nav > li > a:hover {
		text-decoration: none;
		background: blue;
		background-color: navy;
	}
	.nav > li.active > a, .nav > li > a:active, .nav > .dropdown:hover > a {
		background: white;
		color: blue;
	}
	.dropdown {
		position: relative;
		border-bottom: 5px solid white;
	}
	.dropdown:hover ul {
		display: block;
	}
	.dropdown ul {
		display: none;
		position: absolute;
		top: 39px;
		left: -1px;
		z-index: 20000;
		min-width: 160px;
		padding: 0 0 5px;
		background: blue;
		border: 1px solid #dadada;
		border-top: 0;
		border-radius: 0 0 3px 3px;
	}
	.dropdown ul.large {
		min-width: 200px;
	}
	.dropdown li {
		display: block;
		margin: 0 18px;
		overflow: visible;
	}
	.dropdown li + li {
		border-top: 1px solid #eee;
	}
	.dropdown li a {
		color: #FFF;
		padding: 8px 18px;
		margin: 0 -18px;
	}
	.dropdown li a:hover {
		background: navy;
	}
	</style>
</head>
<body>
<div class="container">
<nav>
<ul class="nav">
<li><a href="index.php">Home</a></li>
<li class="dropdown">
<a href="index.php">Electronics</a>
<ul>
<li><a href="itemlist.php?category=CellPhone">Smart Phones</a></li>
<li><a href="itemlist.php?category=Laptop">Laptops</a></li>
<li><a href="index.php">Cameras </a></li>
<li><a href="index.php">Televisions</a></li>
</ul>
</li>
<li class="dropdown">
<a href="index.php">Home & Furniture</a>
<ul class="large">
<li><a href="index.php">Kitchen Essentials</a></li>
<li><a href="index.php">Bath Essentials</a></li>
<li><a href="index.php">Furniture</a></li>
<li><a href="index.php">Dining & Serving</a></li>
<li><a href="index.php">Cookware</a></li>
</ul>
</li>
<li><a href="index.php">Books</a></li>
</ul>
</nav>
</div>
<p>
</p>
</body>
</html>
