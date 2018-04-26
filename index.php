<?php
	include('inc/db.php');
	include('inc/panier.class.php');
	$panier = new Panier();
?>
<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<title>Batiphoenix</title>
			<link rel="stylesheet" type="text/css" href="css/fonts.css">
			<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
			<link rel="icon" type="image/png" href="img/logo.png"/>
			<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
			<link rel="stylesheet" type="text/css" href="css/header.css">
			<link rel="stylesheet" type="text/css" href="css/index.css">
			<link rel="stylesheet" type="text/css" href="css/footer.css">
			<link rel="stylesheet" type="text/css" href="css/modal.css">
			<script type="text/javascript" src="js/jquery.js"></script>
			<script type="text/javascript" src="js/jquery-ui.js"></script>
			<script type="text/javascript" src="js/bootstrap.js"></script>
			<script type="text/javascript" src="js/index.js"></script>
		</head>
		<body>

<!-- ///// HEADER ///// -->

			<?php include('header.php'); ?>

<!-- ///// I HAVE / I NEED ///// -->

			<section id="secondsection">
		    	<div id="buttonzone">
		    		<div class="row">
		    			<div class="col-md-12" id="space">
		    				<div id="phrasedaccroche">
		    						<p id="batissons">
		    							Bâtissons le monde de demain grâce au réemploi des matériaux
		    						</p>
		    						<p id="batiandcare">
		    							BATIPHOENIX VOUS MET EN RELATION
		    						</p>
		    				</div>
		    				<?php
		    					if(isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])){
		    				?>
				    		<div class="col-md-6 ihaveineed" id="ihave">
				    			<div class="circleihaveineed">
				    				<a href="https://catalogue-batiphoenix.typeform.com/to/YG0Dl3" >
				    					<p id="jevends">JE VENDS</p>
				   						<p class="materiaux">des matériaux</p>
				   					</a>
				   				</div>
				   			</div>
				     			<div class="col-md-6 ihaveineed" id="ineed">
			    				<div class="circleihaveineed">
			    					<a href="materiautheque.php">
			    						<p id="jecherche">JE CHERCHE</p>
			    						<p class="materiaux">des matériaux</p>
			    					</a>
			    				</div>
			    			</div>
			    			<?php
			    			}else{
			    			?>
			    			<div class="col-md-6 ihaveineed" id="ihave">
				    			<div class="circleihaveineed">
				    				<a href="https://catalogue-batiphoenix.typeform.com/to/YG0Dl3" >
				    					<p id="jevends">JE VENDS</p>
				   						<p class="materiaux">des matériaux</p>
				   					</a>
				   				</div>
				   			</div>
				     			<div class="col-md-6 ihaveineed" id="ineed">
			    				<div class="circleihaveineed">
			    					<a href="materiautheque.php">
			    						<p id="jecherche">JE CHERCHE</p>
			    						<p class="materiaux">des matériaux</p>
			    					</a>
			    				</div>
			    			</div>
			    			<?php
			    			}
			    			?>
			    		</div>	
		    		</div>
		   	 	</div>
		   	</section>

<!-- ///// WHY BATIPHOENIX ? ///// -->

			<section id="thirdsection">
			<p id="whybatiphonix">pourquoi utiliser batiphoenix  ?</p>
			<p id="answer">première marketplace consacrée au réemploi des matériaux de construction, Batiphoenix accompagne les acteurs du bâtiment dans ce virage écologique.</p>
				<iframe width="640" height="360" src="https://www.youtube.com/embed/11e_UBxSBjI" frameborder="0" allowfullscreen></iframe>
			</section>

<!--- ///// BUSINESS ?  ARTISTIC ? ///// -->

			<section id="fourthsection">
				<img id="fourthsectionimage" src="img/image1.png">
				<button type="button" id="signupfree" data-toggle="modal" data-target="#signupmodal">S'inscrire Gratuitement</button>
			</section>

<!--- ///// REUSE MATERIALS ///// -->

			<section id="fifthsection">
				<img id="fifthsectionimage"  src="img/image2.png">
				<button type="button" id="signupfree" data-toggle="modal" data-target="#signupmodal">S'inscrire Gratuitement</button>
			</section>

<!-- ///// FOOTER //// -->

			<?php include('footer.php'); ?>

		</body>
		</html>