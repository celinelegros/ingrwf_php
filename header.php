<!doctype html>
<html class="no-js" lang="fr">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>PHP pour INGRWF05</title>
<meta name="description" content="INGRWF05 découvre PHP">

<!-- ******************************************************************************************
Set the type and color theme here -->
<link href="css/hawthorne_type1_color6.css" rel="stylesheet">
<!--  ************************************************************************************* -->

<link href="css/font-awesome.min.css" rel="stylesheet">
<script src="js/vendor/modernizr.js"></script>
<style>
#loginForm{
	position:absolute;
	z-index: 1; 
	top:100px;
	margin-left:35%; 
	padding: 60px 100px;
	background-color:white;
}
#loginForm form input {
	width : 250px;
}
#filtre{
	position: absolute;
	width: 100%;
	height:100%;;
	background-color: black;
	top:0px;
	opacity: 0.8;
}
.erreur{
	color:red;
}
.fermBtn{
	float: right;
}
.fermBtn a{
	color: white;
}

</style>
</head>
<body>
<div class="top-border"></div>

<div class="row">
	<div class="small-12 medium-12 large-12 small-centered columns">
		<header>		
			<h1><a href="index.php">Ingrwf05</a></h1>
			<h2><a href="index.php">Design & Programmation</a></h2>
			
			<div class="logo">
				<a href="index.php"><img src="img/logo.png" alt="Your Name Here" /></a>
			</div> <!-- logo -->
			
		</header>
	</div> <!-- columns -->
	<div class="small-12 medium-12 large-12 small-centered columns">
		<nav>
			<ul class="inline-list-custom">
				<li><a href="index.html"<?php myCurrent("index"); ?>>En vedette</a></li>
				<li><a href="about.html"<?php myCurrent("about"); ?>>A propos</a></li>
				<li><a href="contact.html"<?php myCurrent("contact"); ?>>Contact</a></li>
				<?php if(isset($_SESSION['id_user'])): ?>
				<li><a href="admin.php?delog">Se déconnecter</a></li>	
				<?php endif;?>					
			</ul>
		</nav>
	</div> <!-- columns -->
</div> <!-- row -->
