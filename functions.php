<?php 
    // Permets de ne pas afficher les notices mais seulement les erreurs
    define ("DEBUG", true);
    // Si on est entrain de bosser sans DEBUG, on affiche juste les erreurs
        //ini_set('display_errors', 1);
        error_reporting(E_ALL & ~E_NOTICE);
        //error_reporting(E_ERROR);
    // Si on est en DEBUG on affiche TOUT
        if (DEBUG == true): 
            error_reporting(E_ALL);
        endif;
    
    // DEBUG (tjrs mettre en maj) est une constante qui est du coup
    //définie par la fct define
    
    function debug(){
        if (DEBUG == true) :
        // balise pre = preformaté 
        echo '<div id="debug" style="border:1px solid black; padding:8px; background-color: gold">';
        echo "<pre>";
            echo "<strong>GET</strong> <br>";
                print_r($_GET);
            echo "<strong>POST</strong> <br>";           
                print_r($_POST);
            echo "</pre>";
            echo "</div>";
        endif;
    }

// Gestion de class current dans navigation header.php
function myCurrent($page){
    if (isset($_GET['page']) ):
        echo($_GET['page'] == $page) ? ' class="current" ' : ''; 
    endif;
}