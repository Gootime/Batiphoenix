<?php
include('../inc/db.php');
if(isset($_GET)){

  $nom = htmlspecialchars(addslashes($_POST['nom']));
  $prenom = htmlspecialchars(addslashes($_POST['prenom']));
  $mail = htmlspecialchars(addslashes($_POST['mail']));
  $societe = htmlspecialchars(addslashes($_POST['societe']));
  $fonction = htmlspecialchars(addslashes($_POST['fonction']));
  $telephone = htmlspecialchars(addslashes($_POST['telephone']));
  $pass = htmlspecialchars(addslashes($_POST['pass']));
  $passconfirm = htmlspecialchars(addslashes($_POST['passconfirm']));
  $crypt = hash('md5',$pass);
  $sqlVerif = 'SELECT * FROM users WHERE mail ="'.$mail.'"';
  $queryVerif = $db->query($sqlVerif);
  $resultVerif = $queryVerif->fetchAll();
  
  
  if(count($resultVerif) >= 1){
    exit();
  }else{
//    if(filter_var($mail, FILTER_VALIDATE_EMAIL) == true && strlen($telephone) == 10 && ctype_digit($telephone) == true && $pass === $passconfirm && isset($_POST['checkbox'])){
      
    if(filter_var($mail, FILTER_VALIDATE_EMAIL) == false){
      echo 'Veuillez vérifier votre adresse email';
    }elseif(strlen($telephone) != 10 || ctype_digit($telephone) == false){
      echo 'Veuillez vérifier votre numéro de téléphone';
    }elseif($pass !== $passconfirm){
      echo 'Veuillez vérifier votre mot de passe';
    }elseif(!isset($_POST['checkbox'])){
        echo 'Veuillez accepter les CGU';
    }else{
      $pseudo = strstr($mail, '@', true);
      $sql = 'INSERT INTO users(nom, prenom, mail, telephone, date_inscription, pseudo , password, power_rank, color, status, Societe, Fonction) VALUES ("'.$nom.'","'.$prenom.'","'.$mail.'","'.$telephone.'",CURDATE(),"'.$pseudo.'","'.$crypt.'","0","#214761","no-valide","'.$societe.'","'.$fonction.'")';
      $querysignup = $db->query($sql);
      $_SESSION['pseudo'] = $pseudo;
      echo 'Inscritpion réussie'; 
    }
}
//  if($pass === $passconfirm){
//      echo 'Bien joué'; 
//    }else{
//        echo 'Raté';
//    }
//
}
 ?>
