<?php 
if (isset($_POST['insert_module'])):
require("config.php");
$sql=sprintf("INSERT INTO modules SET titre='%s', contenu='%s', role='%s', responsable='%s', centre='%s', annee='%s', image1='%s', alt_image1='%s', image2='%s', alt_image2='%s', image3='%s', alt_image3='%s'",
addslashes($_POST['titre']),
addslashes($_POST['contenu']),
addslashes($_POST['role']),
addslashes($_POST['responsable']),
addslashes($_POST['centre']),
$_POST['annee'],
$_POST['image1'],
$_POST['alt_image1'],
$_POST['image2'],
$_POST['alt_image2'],
$_POST['image3'],
$_POST['alt_image3']
);
$connect->query($sql);
echo $connect->error;
header("location:index.php");
exit;
endif;


$sql = "SELECT * FROM modules";
$modules_list = $connect->query($sql);
echo $connect->error;
$nb_modules = $modules_list->num_rows;
?>
<div class="row">
	<div class="small-12 medium-12 large-12 columns">
		<ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-3 inline-list-custom">
			<?php while ($row = $modules_list -> fetch_object()): ?>			
			<!-- Begin project -->
			<li>
				<figure class="thumbnail">
					<div class="thumbnail-img">
						<div class="thumbnail-hover"><a href="projet-<?php echo $row->id_module; ?>.html"></a></div>
						<a href="projet-<?php echo $row->id_module; ?>.html"><img src="img/projects/<?php echo $row->id_module?>-1.jpg" style="height:180px; width:450px;" alt="<?php echo $row->titre;?>" /></a>
					</div>
					<figcaption class="thumbnail-caption"><a class="caption-link" href="projet-<?php echo $row->id_module; ?>.html"><?php echo $row->titre; ?></a></figcaption>
				</figure>
			</li>
			<!-- End project -->
			<?php endwhile; ?>

		</ul>

		<button id="add-module">Ajouter un module</button>

		<form style="display:none;" method="post" action="home.php" id="module_form">
			<label for="titre">Titre</label>
			<input type="text" id="titre" name="titre">
			<label for="contenu">Contenu</label>
			<textarea name="contenu" id="contenu" form="module_form"></textarea>
			<label for="role">Rôle</label>
			<input type="text" id="role" name="role">
			<label for="responsable">Responsable</label>
			<input type="text" id="responsable" name="responsable">
			<label for="centre">Centre</label>
			<input type="text" id="centre" name="centre">
			<label for="annee">Année</label>
			<input type="number" id="annee" name="annee">

			<label for="image1">Url de l'image 1</label>
			<input type="text" name="image1" id="image1">
			<br>
			<label for="alt_image1">Texte alt de l'image 1</label>
			<input type="text" name="alt_image1" id="alt_image1">
			<br>
			<label for="image2">Url de l'image 2</label>
			<input type="text" name="image2" id="image2">
			<br>
			<label for="alt_image2">Texte alt de l'image 2</label>
			<input type="text" name="alt_image2" id="alt_image2">
			<br>
			<label for="image3">Url de l'image 3</label>
			<input type="text" name="image3" id="image3">
			<br>
			<label for="alt_image3">Texte alt de l'image 3</label>
			<input type="text" name="alt_image3" id="alt_image3">
			<br>

			<input type="hidden" name="insert_module">
			<button type="submit">Envoyer</button>

		</form>

	</div> <!-- column  -->
</div> <!-- row -->

<?php print_r($_POST); ?>