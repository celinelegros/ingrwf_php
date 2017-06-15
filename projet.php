<?php 
$sql = "SELECT * FROM modules WHERE id_module = ".$_GET['projet'];
$modules_list = $connect->query($sql);
echo $connect->error;
$nb_modules = $modules_list->num_rows;
?>

<div class="row">
	<?php if ($nb_modules > 0): 
		while ($row = $modules_list -> fetch_object()): ?>
	<div class="small-12 medium-7 large-7 columns">
		<h2><?php echo $row->titre; ?></h2>
		<?php echo $row->contenu; ?>

	<p>Ca dépasse le stade du code (pas que copier/coller) mais également au niveau de la connaissance : collecte, organisation, modélisation…. Il est nécessaire aussi d’organiser la veille technologique d’une entreprise sans dupliquer ou répéter deux fois la même chose/recherche/stockage dans un secteur en perpétuel changement.</p>
</div>
	<div class="small-12 medium-5 large-5 columns">
		<div class="lined-list">
			<ul>
				<li><strong>Rôle:</strong> <?php echo $row->role; ?></li>
				<li><strong>Responsable:</strong> <?php echo $row->responsable; ?></li>
				<li><strong>Centre:</strong> <?php echo $row->centre; ?></li>
				<li><strong>Année:</strong> <?php echo $row->annee; ?></li>
			</ul>
		</div>
	</div>
</div>

<div class="row">
	<div class="small-12 medium-12 large-12 columns">
		<hr class="project-detail-hr" />
		
		<!-- Begin project image -->
		<div class="project-img">
			<img src="img/projects/<?php echo $row->image1; ?>" alt="<?php echo $row->alt_image1?>" />
			<h6><?php echo $row->alt_image1; ?></h6>
		</div>
		<!-- End project image -->
		
		<!-- Begin project image -->
		<div class="project-img">
			<img src="img/projects/<?php echo $row->image2?>" alt="<?php echo $row->alt_image2;?>" />
			<h6><?php echo $row->alt_image2;?></h6>
		</div>
		<!-- End project image -->
		
		<!-- Begin project image -->
		<div class="project-img">
			<img src="img/projects/<?php echo $row->image3?>" alt="<?php echo $row->alt_image3;?>" />
			<h6><?php echo $row->alt_image3?></h6>
		</div>
		<!-- End project image -->
		
		<?php endwhile; 
			else : echo 'oups, erreur';
		endif;?>


	</div> <!-- column --> 
</div> <!-- row -->

<div class="row">
	<div class="small-12 medium-12 large-12 columns">
		<p class="back-to-top-holder"><a class="back-to-top"><i class="fa fa-chevron-circle-up fa-3x"></i></a></p>
	</div> <!-- columns -->
</div> <!-- row -->
