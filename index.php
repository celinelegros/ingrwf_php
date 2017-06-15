<?php require("config.php");?>
<?php include('functions.php');?>
<?php include('header.php');?>

<?php 
if (isset($_GET['page'])) :
    switch($_GET['page']) : 
        case 'about': 
            include("about.php");
            break;
        case 'contact' :
            include("contact.php");
            break;
        default : include("home.php");  
    endswitch;
elseif (isset($_GET['projet']) ) :
    include("projet.php");
else : 
    include('home.php');
endif; 
?>

<?php include('footer.php');?>