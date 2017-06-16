<?php 
if(isset($_GET['delog'])) :
session_start();
unset($_SESSION['id_user']);
unset($_SESSION['role']);
header("location:admin.html");
exit;
endif;
## LE CONNEXION !! Bièsse, tu dois le mettre dans ton formulaire pour qu'il ait un endroit ou renvoyer les données'
if (isset($_POST['connexion'])):
$sql= sprintf("SELECT * FROM users WHERE login ='%s' AND password='%s' ",
$_POST['login'],
md5($_POST['password'])
);
require('config.php');
$test_log= $connect->query($sql);
echo $connect -> error;
$nb_user = $test_log->num_rows;
    if ( $nb_user > 0 ):
    ##Si on a au moins un utilisateur, on va récupérer l'utilisateur en tant qu'objet
    $row = $test_log->fetch_object();
        ##session_start();
        ##Activer la session avec session_start -> On l'a mit dans config.php pcq la session doit être checkée en permanence'
        $_SESSION['id_user'] = $row->id_user;
        $_SESSION['role'] = $row->role;
        header("location:index.html");
        exit;
    else:
        header("location:index.php?erreur=log&page=admin");
        ## On crée une entrée et on attribut un ID à l'utilisateur qui vient de se connecter
    exit;
    endif;
endif;

?>

<?php if (isset($_GET['page']) AND $_GET['page'] == 'admin') : ?>
<div id="loginForm">
<?php if(isset($_GET['erreur']) AND $_GET['erreur']=='log') :?>
<p class="erreur">Erreur de login/password</p>
<?php endif;?>
<button class="fermBtn"><a href="index.html">X</a></button>
    <form  action="admin.php" method="post">
        <input type="text" id="login" name="login" placeholder="login"><br>
        <input type="password" id="password" name="password" placeholder="mot de passe"><br>
        <input type="submit" name="connexion" value="se connecter">
    </form>
</div>
<div id="filtre"></div>
<?php endif; ?> 
