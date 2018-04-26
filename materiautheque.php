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
			<link rel="stylesheet" type="text/css" href="css/matheriautheque.css">
			<link rel="stylesheet" type="text/css" href="css/footer.css">
			<link rel="stylesheet" type="text/css" href="css/modal.css">
			<script type="text/javascript" src="js/jquery.js"></script>
			<script type="text/javascript" src="js/jquery-ui.js"></script>
			<script type="text/javascript" src="js/bootstrap.js"></script>
			<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
			<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<body>

<!-- ///// NAVBAR //// -->

	<?php include('header.php'); ?>

<!-- ///// SIDEBAR ///// -->
	<div id="pagetitle">
		<p>MATÉRIAUTHÈQUE</p>
	</div>
	<div class="row">
		<div class="col-md-2" id="sidebar">
			<div class="row">
				<div class="col-md-12" id="checkboxes">
				<div id="filterstitle">
					<p>CATÉGORIES</p>
				</div>
					<?php
						//Génération des checkBoxs de filtre
						$sql = 'SELECT * FROM categorie';
						$query = $db->query($sql);
						$result = $query->fetchAll();
						echo '<div id="filters"><input type="checkbox" onclick="window.location.reload()"  class="categorie_filters"><label class="categorie_name"> Tous</label><br>';
						for($i=0;$i < count($result);$i++){
					?>
					<input type="checkbox" class="categorie_filters" name="categorie" value="<?=$result[$i]['id'];?>" onclick="filters()">
					<label class="categorie_name"><?=$result[$i]['name'];?></label><br>
					<?php
						}
					?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12" id="map">
					
				</div>
			</div>
		</div>
		<div class="col-md-10">
			<div class="filters_resuls">
				<?php
				$sql = "SELECT * FROM produit WHERE status='valide'";
				$query = $db->query($sql);
				$result = $query->fetchAll();
				for($i=0;$i<count($result);$i++){
					$sqlCat = 'SELECT * FROM categorie WHERE id= "'.$result[$i]['cat_id'].'"';
					$queryCat = $db->query($sqlCat);
					$resultCat = $queryCat->fetchAll();

					$sqlChantier = 'SELECT * FROM chantier WHERE id="'.$result[$i]['idChantier'].'"';
					$queryChantier = $db->query($sqlChantier);
					$resultChantier = $queryChantier->fetchAll();

					echo '<div class="result col-md-3">
							<img src="'.$result[$i]['picture'].'" class="image_result" >
							<p class="name_result">'.$result[$i]['nom_du_produit'].'</p>
							<p class="adresse_result">'.$resultChantier[0]['adresse'].'</p>
							<button class="result_info_button" data-toggle="modal" data-target="#result_information" data-whatever="'.$result[$i]['nom_du_produit'].'" onclick="product(this.value)" value="'.$result[$i]['nom_du_produit'].'">En savoir plus</button>
						</div>';
				}
				?>

<!-- SCRIPT -->
	<script type="text/javascript">
	function product(info){
		(function($){
			$('.modal-result').html('');
			//console.log(info)
	  		var input = document.getElementById('recipient-name');
	  		input.value = info;
	  		$.ajax({
				type : 'GET',
	            url : "action/fiche.php?name="+info,
	            data: "name="+info,
	            dataType: 'json',
	            contentType:"application/x-www-form-urlencoded",
	         	processData: true,
	            success: function(data){
	                var html = '';
				    for(k=0;k < data.length;k++){
				        var prop = Object.keys(data[k]);
				            if(prop[0] === "img"){
				                html +='<div class="result_popup col-md-6"><img src="'+data[k].img+'" class="image_result_popup">'
				            }
				            if(prop[0] === "name"){
				                html += '<p class="name_result_popup">'+data[k].name+'</p>'
				            }
				            if(prop[0] === "stock"){
				                html += '<div class="stock_result_popup"><p class="text_stock">En stock : </p><p class="number_stock">'+data[k].stock+'</p></div>'
				            }
				            if(prop[0] === "prix"){
				                html += '<p class="prix_result_popup">'+data[k].prix+' €/u</p></div>'
				            }
				            if(prop[0] === "desc"){
				                html += '<div class="col-md-6"><p class="desc_title">Description du produit</p><p class="description_result_popup">'+data[k].desc+'</p>'
				            }

				            if(prop[0] === "adresse"){
				                html += '<p class="adresse_title">Où trouver votre produit ?</p><p class="adresse_result_popup">'+data[k].adresse+'</p></div>'
				            }
				    }
				    $('.modal-result').append(html);
	            },
	                			
	    	});

		})(jQuery);
	}
		function filters(){
			(function($){
				$('input.categorie_filters').on('change', function() {
	    		$('input.categorie_filters').not(this).prop('checked', false); 
	    		$('.filters_resuls').html("")
			});
				var id = document.querySelectorAll('input[name=categorie]:checked');
				if(id[0].value === undefined){
				    window.location.reload()
				}
							$.ajax({
								type : 'POST',
	            				url : "action/filters.php",
	            				data: "id="+id[0].value,
	            				dataType: 'json',
	            				contentType:"application/x-www-form-urlencoded",
	         					//async: true,
	         					
	         					processData: true,
	                			success: function(data){
	                				var html = '';
				                    for(k=0;k < data.length;k++){
				                    	var prop = Object.keys(data[k]);
				                    	if(prop[0] === "name"){
				                    		html += '<div class="result col-md-3"><p class="name_result">'+data[k].name+'</p><button class="result_info_button_ajax" data-toggle="modal" data-target="#result_information" data-whatever="'+data[k].name+'">En savoir plus</button>'
				                    	}
				                    	if(prop[0] === "img"){
				                    		html +='<img src="'+data[k].img+'" class="image_result">'
				                    	}
				                    	if(prop[0] === "adresse"){
				                    		html += '<p class="adresse_result">'+data[k].adresse+'</p></div>'
				                    	}

				                    }
				                    $('.filters_resuls').append(html)
				                    ;
	                			},
	                			
	        				});
							
				
			})(jQuery);
		}
	</script>

				</div>
			</div>
		</div>

<!-- ///// MODAL RESULT -->

	<div class="modal fade" id="result_information" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  			<div class="modal-dialog result_modal" role="document">
			   				<div class="modal-content modal_content_result">
			     				<div class="modal-header">
        							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        							<h4 class="modal-title" id="exampleModalLabel">Informations</h4>
      							</div>
							      <div class="modal-body">
								  
							            <label for="recipient-name" class="control-label"></label>
							            <input type="hidden" class="form-control" id="recipient-name" readonly>
							            <div class="modal-result"></div>
							      </div>
			     				<div class="modal-footer">						    				<a href="http://eepurl.com/cTtrtD" >
		<button type="button" id="signupfree" >ça m'intéresse</button>

			       						
			     				</div>
			  				</div>
			  			</div>
					</div>

<!-- ///// FOOTER //// -->

	<?php include('footer.php'); ?>

</body>