<?php
	include('inc/db.php');
	include('inc/panier.class.php');
	$panier = new Panier();

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Contact</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Kreon:700" rel="stylesheet">
</head>
<body>

<!-- ///// NAVBAR //// -->
	<div class="fullnavbar">
		<div id="firstnavbar">
      <?php
      if(!empty($_SESSION['pseudo'])){
      $sqlPower = 'SELECT * FROM users WHERE pseudo="'.$_SESSION['pseudo'].'"';
    	$queryPower = $db->query($sqlPower);
			$resultPower=$queryPower->fetchAll();
      if($resultPower[0]['power_rank'] == "1"){?>
        <div id="social" class="col-md-6">
          <p id="staytune">Restez informé :</p>
          <a href="">
            <img class="sociallink" src="img/facebook.png">
          </a>
          <a href="">
            <img class="sociallink" src="img/twitter.png">
          </a>
          <a href="">
            <img class="sociallink" src="img/instagram.png">
          </a>
          <a href="forms/form.addproduit.php">
            <i class="fa fa-plus sociallink fa-4x customClass" aria-hidden="true"></i>
          </a>
					<a href="panier.php">
						<i class="fa fa-cart-arrow-down customClass fa-4x" aria-hidden="true"></i>
					</a>

        </div>
        <?php
      }else{
        ?>
          <div id="social" class="col-md-6">
            <p id="staytune">Restez informé :</p>
            <a href="">
              <img class="sociallink" src="img/facebook.png">
            </a>
            <a href="">
              <img class="sociallink" src="img/twitter.png">
            </a>
            <a href="">
              <img class="sociallink" src="img/instagram.png">
            </a>
						<a href="panier.php">
							<i class="fa fa-cart-arrow-down customClass fa-4x" aria-hidden="true"></i>
						</a>
          </div>
          <?php
      }
    }else{
      ?>
        <div id="social" class="col-md-6">
          <p id="staytune">Restez informé :</p>
          <a href="">
            <img class="sociallink" src="img/facebook.png">
          </a>
          <a href="">
            <img class="sociallink" src="img/twitter.png">
          </a>
          <a href="">
            <img class="sociallink" src="img/instagram.png">
          </a>
        </div>
        <?php
    }
       ?>

			<?php
				if(empty($_SESSION['pseudo'])){
			?>
			<div id="login" class="col-md-6 text-right">
				<form action="action/actionLogIn.php" method="post">
					<input class="logbar" type="email" name="mail" placeholder="Adresse e-mail">
					<input class="logbar" type="password" name="pass" placeholder="Mot de passe">
					<input id="connexion" type="submit" name="submit" value="Se connecter">
					<a href="forms/form.signup.php"><button type="button" id="signup">S'enregistrer</button></a>
				</form>
			</div>
			<?php
		}else{
			?>
			<div id="login" class="col-md-6 text-right">
				<a href="profil.php" class="logbar">Voir le Profil</a>
				<a href="action/action.logOut.php" class="logbar">Déconnexion</a>
			</div>
			<?php
		}
			 ?>
		</div>

		<div id="secondnavbar">
			<a href="index.php"><img class="col-md-1" id="logo" src="img/logo.jpg"></a>
			<ul id="listnavbar" class="col-md-9">
				<li class="line"></li>
				<a href="">
					<li id="home" class="itemnavbar">
						<img src="img/home.png">
					</li>
				</a>
				<li class="line"></li>
					<li class="itemnavbarone">équipements
						<ul class="undermenuone">
							<a href=""><li class="undermenuitemone">Panneaux solaires</li></a>
							<a href=""><li class="undermenuitemone">Pompes à chaleur</li></a>
							<a href=""><li class="undermenuitemone">Chauffage</li></a>
							<a href=""><li class="undermenuitemone">Ventilation</li></a>
							<a href=""><li class="undermenuitemone">Sanitaire</li></a>
							<a href=""><li class="undermenuitemone">Eclairage</li></a>
						</ul>
					</li>
				<li class="line"></li>
				<a href="">
					<li class="itemnavbartwo">matériaux
					<!-- 	<ul class="undermenutwo">
							<a href=""><li class="undermenuitemtwo">Isolation</li></a>
							<a href=""><li class="undermenuitemtwo">Etanchéité</li></a>
							<a href=""><li class="undermenuitemtwo">Façade</li></a>
							<a href=""><li class="undermenuitemtwo">Menuiseries</li></a>
							<a href=""><li class="undermenuitemtwo">Finitions</li></a>
						</ul> -->
					</li>
				</a>
				<li class="line"></li>
				<a href="">
					<li class="itemnavbar">qui sommes-nous ?</li>
				</a>
				<li class="line"></li>
				<a href="contact.php">
					<li class="itemnavbar" style="color: red;"> contact</li>
				</a>
				<li class="line"></li>
				<li class="itemnavbar">
					<form action="" method="post" id="test">
						<i id="searchicon"  class="fa fa-search" aria-hidden="true"></i>
						<input id="search" type="text" name="search" placeholder="Rechercher">
					</form>
				</li>
			</ul>
		</div>
	</div>
	<div class="row">
		<em>Tous les champs marqués d'une * sont obligatoire</em>
			<form action="action/sendMail.php" method="post" class="contactform">
				<input type="text" name="name" placeholder="Votre nom..." required autofocus>*<br>
				<input type="mail" name="mail" placeholder="Votre Email" required>*<br>
				<input type="text" name="telephone" placeholder="Votre numéro de téléphone..." required>*<br>
				<input type="text" name="subject" placeholder="Sujet..." required>*<br>
				<textarea name="message" placeholder="Votre message..." style="resize: none;"></textarea>
				<input type="submit" value="Envoyer">
			</form>
	</div>
	</body>
	</html>