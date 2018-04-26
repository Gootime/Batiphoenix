<?php
include('../inc/db.php');
$name = htmlspecialchars(addslashes($_GET['name']));
//$name = 'Polystyrène 2500x1200x200';
$sql = 'SELECT * FROM produit WHERE nom_du_produit="'.$name.'" AND status="valide"';
$query = $db->query($sql);
$result = $query->fetchAll();
$data = array();
for($k=0;$k < count($result);$k++){

	$sqlChantier = 'SELECT * FROM chantier WHERE id="'.$result[$k]['idChantier'].'"';
	$queryChantier = $db->query($sqlChantier);
	$resultChantier = $queryChantier->fetchAll();

	$data[]['img'] = $result[$k]['picture'];
	$data[]['name'] = $result[$k]['nom_du_produit'];
	$data[]['stock'] = $result[$k]['Stock'];
	$data[]['prix'] = $result[$k]['Prix'];
	$data[]['desc'] = $result[$k]['description'];
	$data[]['adresse'] = $resultChantier[0]['adresse'];
		
}
$out = array_values($data);
echo json_encode($out);
// $fp = fopen('results.json', 'w');
// fwrite($fp, json_encode($out));
// fclose($fp);

?>