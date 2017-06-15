<?php require("config2.php");?>
<?php 
    if (isset($_POST['insert_personne'])):
    $sql= sprintf("INSERT INTO personnes SET nom = '%s', prenom ='%s', email= '%s', ddn='%s', genre='%s', telephone='%s' ",
    addslashes($_POST['nom']),
    addslashes($_POST['prenom']),
    $_POST['email'],
    $_POST['ddn'],
    $_POST['genre'],
    $_POST['telephone']
    );
    $connect->query($sql);
    echo $connect->error;
    header("location:listing.php");
    exit;

    endif;

    ##Requête pour accéder aux données
    $sql = "SELECT * FROM personnes ORDER BY nom, prenom";
    ## $q_personnes = le résultat de la requête
    $q_personnes = $connect->query($sql);
    ## $connect --> connexion à la BD mySQL
    echo $connect->error;
    $nb_personnes = $q_personnes->num_rows;

    if(isset($_GET['IDpersonnes'])) :
    $sql = "SELECT * FROM personnes WHERE IDpersonnes =".$_GET['IDpersonnes'];
    $the_personne = $connect->query($sql);
    echo $connect->error;
    $the_nb_personne = $the_personne->num_rows;
    endif;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listing</title>
    <style>
        body{
            display:flex;
            width: 75%;
            margin : auto;
        }
        main{
            width: 80%;
        }
        .formulaire{
            display: flex;
            flex-direction:column;
            width: 50%;
        }
    </style>
</head>
<body>
    <main>
        <!-- On teste si la variable existe (isset) et puis (and) on teste si la variable est supérieure à 0 -->
        <?php if (isset($the_nb_personne) AND $the_nb_personne > 0) : 
        while ($row = $the_personne -> fetch_object()) : ?>
        <h1>Fiche</h1>
        <h2><?php echo $row->prenom;?> <?php echo $row->nom;?></h2>
        <p>Né le <?php echo ($row->ddn != '')? $row->ddn : 'Inconnu';?></p>
        <dl>
            <dt>Email</dt>
            <dd><?php echo $row->email;?></dd>
            <dt>Tel</dt>
            <dd><?php echo $row->telephone;?></dd>

        </dl>
        <?php endwhile;
        else : echo "personne";
        endif; ?>

        <form class="formulaire" method="post" action="listing.php">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom">
            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            <label for="telephone">Téléphone:</label>
            <input type="text" id="telephone" name="telephone">
            <label for="ddn">Date de naissance:</label>
            <input type="date" id="ddn" name="ddn">
            <br>
            <p class="label">Genre : </p>
            <div class="sexe">
            <input type="radio" value="F" id="genre_F" name="genre">
            <label for="genre_F">Féminin</label>
            <input type="radio" value="M" id="genre_H" name="genre">
            <label for="genre_H">Masculin</label>
            </div>
            <br>
            <input type="hidden" name="insert_personne">
            <button type="submit">Insérer</button>
        </form>
    </main>
    <aside>
        <?php if($nb_personnes > 0) : ?>
        <ul>
            <!-- Boucle qui permet d'afficher les données que ma requête me retourne' -->
            <?php while ( $row = $q_personnes->fetch_object()) : 
            //print_r($row); ?>
            <li><a href="?IDpersonnes=<?php echo $row->IDpersonnes?>"><?php echo $row->nom;?> <?php echo $row->prenom;?></a></li>
            <?php endwhile; ?>
        </ul>
        <?php else : 
            echo "il n y a personne"; 
            endif; ?>
    </aside>

</body>
</html>

<?php print_r($_POST); ?>