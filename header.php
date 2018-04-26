<head>
	<script type="text/javascript" src="js/index.js"></script>
	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  	<script type="text/javascript">
  	
  		function upper(num){
		 	$("#span"+num).css("transition-duration", "0.5s");
		    $("#span"+num).css("top", "-16px");
		    $("#span"+num).css("font-size", "12px");
		}
		function submitFormSignUp(){
                    
                    var prenom= document.getElementById("item1").value;
                    var nom = document.getElementById("item2").value;
                    var societe = document.getElementById("item3").value;
                    var fonction = document.getElementById("item4").value;
                    var mail = document.getElementById("item5").value;
                    var telephone = document.getElementById("item6").value;
                    var password = document.getElementById("item7").value;
                    var confirm = document.getElementById("item8").value;
			
			$.ajax({
	            type: 'GET',
	            url : '/action/action.signup.php',
	            data: {'prenom' : prenom, 'nom' : nom , 'societe' : societe , 'fonction' : fonction , 'mail' : mail , 'telephone' : telephone , 'pass' : password, 'confirm' : confirm},
	            success : function(){ // success est toujours en place, bien sûr !
                        alert('Ok');
	           	document.location.href = "action/action.signup.php";
                    },
                    error : function(){
                        alert('raté');  
	       		document.location.href = "action/action.signup.php";
                    }
                    });
                }
 		function submitForm(){
				var mail = document.getElementById('item9').value;
				var pass = document.getElementById('item10').value;
				$.ajax({
		            type: 'POST',
		            url : "action/actionLogIn.php",
		            data: {mail : mail, pass : pass},
		            success : function(){ // success est toujours en place, bien sûr !
		           		document.location.href = "index.php"
		           		
		       	},
		       		error : function(){
		       			document.location.href = "index.php"
		       			
		       }
		        });

 		}
  	</script>
</head>

<?php
	
	$not_log='
		<li class="itemmenu">
			<button type="button" id="signin" class="itemmenubutton" data-toggle="modal" data-target="#signinmodal">Connexion</button>
		</li>
		<li class="itemmenu">
			<button type="button" id="signup" class="itemmenubutton" data-toggle="modal" data-target="#signupmodal">Inscription</button>
		</li>';
	$log = '
		<li class="itemmenu">
			<a href="action/action.logOut.php"><button type="button" id="signin" class="itemmenubutton">Déconnexion</button></a>
		</li>';
?>

				<section id="firstsection">
					<div class="row">
						<div class="col-md-1">
							<a href="../"><img src="img/logo.png" id="logo"></a>
						</div>
						<div class="col-md-3">
							<i id="searchicon" class="fa fa-search fa-2x" aria-hidden="true"></i>
							<select class="js-data-example-ajax select2searchbar" id="searchbarform">
							</select>
						</div>
						<div class="col-md-8">
							<ul id="menu">
							<a class="navbarlinks" href="http://batiphoenix.com/">
						      <li class="itemmenu">Accueil</li>
						    </a>
						    <a class="navbarlinks" href="materiautheque.php">
						      <li class="itemmenu">Matériauthèque</li>
						    </a>
						    <a class="navbarlinks" href="https://batiphoenix.wordpress.com/a-propos/"> 
						      <li class="itemmenu">à propos</li>
						    </a>
						    <a class="navbarlinks" href="https://batiphoenix.wordpress.com/contact/">
						      <li class="itemmenu">Contact</li>
						    </a>
						      <?=$log_or_not = (!isset($_SESSION['pseudo']) && empty($_SESSION['pseudo'])) ? $not_log : $log;?>	
						    </ul>
						</div>
					</div>
				</section>
				<div id="takespaceundernavbar"></div>

			<!-- ///// MODALS POPUP ///// -->

					<div class="modal fade" id="signinmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  			<div class="modal-dialog" role="document">
			   				<div class="modal-content">
			     				<div class="modal-header">
			      						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			       						<img class="modallogo" src="img/LogoAndBatiphoenix.png">
			     				</div>
			     				<div class="modal-body">
			     					<h2 id="signintitle">CONNEXION</h2>
			     					<form method="post" class="signform"  id="connectForm">
			     						<div class="row signupformlines">
					     					<div class="col-md-12">
					     						
					     						<span id="span9" class="item"><i class="fa fa-user fa-2x" aria-hidden="true"></i>E-mail</span>
					      						<input type="mail" name="mail" class="signinformitems" required id="item9" onblur="check(this.value, 9)" onclick="upper(9)" required>
					      					</div>
					      				</div>
					      				<div class="row signupformlines">
					      					<div class="col-md-12">
					      						<span id="span10">Mot de Passe</span>
					      						<input type="password" name="pass" class="signinformitems" required id="item10" onblur="check(this.value, 10)"  onclick="upper(10)" required>
					      					</div>
					      				</div>
					      				<div class="col-md-12">
			       							<button name="submit" type="submit" class="btn btn-default" id="loginbutton" data-dismiss="modal" onclick="submitForm()">Connexion</button>
			       						</div>
				      				</form>
			     				</div>
			     				<div class="modal-footer">
			       						
			       						<div class="col-md-12">
			       							<p id="alreadyaccount">Vous n'avez pas de compte ?
			       								<a href="#signmodal" id="signuplink">Inscrivez-vous !</a>
			       							</p>
			       						</div>
			     				</div>
			  				</div>
			  			</div>
					</div>

					<div class="modal fade" id="signupmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  			<div class="modal-dialog" role="document">
			   				<div class="modal-content">
			     				<div class="modal-header">
			      						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			       						<img class="modallogo" src="img/LogoAndBatiphoenix.png">
			     				</div>
			     				<div class="modal-body">
			     					<h2 id="signuptitle">INSCRIPTION</h2>
			      					<form method="post" class="signform" id="SignUpForm" onsubmit="">
			      						<div class="row signupformlines">
			      							<div class="col-md-6">
			      								<span id="span1">Prénom</span>
			      								<input type="text" name="prenom" class="signupformitems" id="item1" onblur="check(this.value, 1)" onclick="upper(1)"  required>
			      							</div>
			      							<div class="col-md-6">
			      								<span id="span2">Nom de Famille</span>
			      								<input type="text" name="nom" class="signupformitems" id="item2" onblur="check(this.value, 2)" onclick="upper(2)"  required>
			      							</div>
			      						</div>
			      						<div class="row signupformlines">
			      							<div class="col-md-6">
			      								<span id="span3">Société</span>
			      								<input type="text" name="societe" class="signupformitems" id="item3" onblur="check(this.value, 3)" onclick="upper(3)"  required>
			      							</div>
			      							<div class="col-md-6">
			      								<span id="span4">Fonction</span>
			      								<input type="text" name="fonction" class="signupformitems" id="item4" onblur="check(this.value, 4)" onclick="upper(4)"  required>
			      							</div>
			      						</div>
			      						<div class="row signupformlines">
			      							<div class="col-md-6">
			      								<span id="span5">Adresse E-Mail</span>
			      								<input type="mail" name="mail" class="signupformitems" id="item5" onblur="check(this.value, 5)" onclick="upper(5)"  required>
			      							</div>
			      							<div class="col-md-6">
			      								<span id="span6">Numéro de Téléphone</span>
			      								<input type="text" name="telephone" class="signupformitems" id="item6" onblur="check(this.value, 6)" onclick="upper(6)"  required>
			      							</div>
			      						</div>
			      						<div class="row signupformlines">
			      							<div class="col-md-6">
			      								<span id="span7">Mot de Passe</span>
			      								<input type="password" name="pass" class="signupformitems" id="item7" onblur="check(this.value, 7)" onclick="upper(7)"  required>
			      							</div>
			      							<div class="col-md-6">
			      								<span id="span8">Confirmation</span>
			      								<input type="password" name="passconfirm" class="signupformitems" id="item8" onblur="check(this.value, 8)" onclick="upper(8)"  required>
			      							</div>
			      						</div>
			      						<div class="row signupformlines">
				      							<div class="dol-md-12">
				      								<input id="checkboxcgu" type="checkbox" name="checkbox">
				      								<label for="checkboxcgu">J'accepte les conditions générale d'utilisation</label>
				      							</div>
				      						</div>
			      					</form>
			     				</div>
			     				<div class="modal-footer">
			     						<div class="col-md-12">
			       							<button type="button" class="btn btn-default" id="signupbutton" data-dismiss="modal" onclick="submitFormSignUp()">Inscription</button>
			       						</div>
			       						<div class="col-md-12">
			       							<p id="alreadyaccount">Vous avez déjà un compte ? 
			       								<a href="#signinmodal" id="signinlink">Connectez vous !</a>
			       							</p>
			       						</div>
			     				</div>
			  				</div>
			  			</div>
					</div>