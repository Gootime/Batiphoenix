<?php
include('../inc/db.php');
$sqlVerif = 'SELECT * FROM users WHERE mail="'.$_POST['mail'].'" AND password = "'.md5($_POST['pass']).'"';
$queryVerif = $db->query($sqlVerif);
$resultVerif = $queryVerif->fetchAll();
$countVerif = count($resultVerif);
$username = $resultVerif[0]['mail'];
$password = $resultVerif[0]['password'];
echo $sqlVerif;
	if(isset($_POST['mail']) && isset($_POST['pass'])){

	  if($_POST['mail'] === $username && MD5($_POST['pass']) === $password){
	  	$_SESSION['pseudo'] = strstr($_POST['mail'], '@', true);
	  	
	    echo "Success";        
	  }
	  else{
	    echo "Failed";
	  }
	}
?>
