<?php 
if (isset($_POST['insert_module'])):
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
exit;
endif;

$sql = "SELECT * FROM modules WHERE id_module = ".$_GET['projet'];
$modules_list = $connect->query($sql);
echo $connect->error;
$nb_modules = $modules_list->num_rows;
?>