<?php
include('../inc/db.php');
include('function.php');
libs();
$sqlVerif = 'SELECT * FROM users WHERE pseudo="'.$_SESSION['pseudo'].'"';
$queryVerif = $db->query($sqlVerif);
$resultVerif = $queryVerif->fetchAll();
if(!empty($_SESSION['pseudo']) && $resultVerif[0]['power_rank'] == '10'){
    Navbar_admin();
}else if(!empty($_SESSION['pseudo']) && $resultVerif[0]['power_rank'] == '2'){
    Navbar_provider();
}
else{
    Navbar_user();
}
?>
 
        <div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Faire une demande pour devenir fournisseur</h2>
                            
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                <?php
                	if($resultVerif[0]['status'] === "pending"){
                		?>
                		<div class="col-lg-12 col-md-12">
                    	Vous avez deja soumis une demande
                    </div>
                		<?php
                	}else{
                ?>
                    <div class="col-lg-12 col-md-12">
                    	Je confirme que je souhaite devenir fournisseur et donc collaborer avec batiphoenix
                    	<form action="../action/becomeProvide.php" method="post">
                            <div class="form-group">
                                <label>Nom du Fournisseur</label>
                                <input class="form-control" name="provide_name" required />
                            </div>
                            <div class="form-group">
                                <label>Adresse</label>
                                <input type="text" name="numero_rue" placeholder="Numero de Rue" class="form-control" required>
                                <select class="form-control" name="qualification-lieu" required>
                                  <option value="Rue">Rue</option>
                                  <option value="Boulevard"> Boulevard</option>
                                  <option value="Place">Place</option>
                                  <option value="Avenue">Avenue</option>
                                  <option value="Lieux-Dit">Lieux-Dit</option>
                                   <option value="Allée">Allée</option>
                                </select>
                                <input type="text" name="nom_rue" placeholder="Nom de la rue" class="form-control" required>
                                <input type="text" name="zip" placeholder="Code Postal" class="form-control" required>
                                <input type="text" name="ville" placeholder="Ville" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Afficher sur la map : </label>
                               Si vous souhaitez avoir votre marker sur la map merci de nous contacter via le formulaire de contact
                            </div>
                    		<input type="submit" value="Envoi de la demande">
                    	</form>
                    </div>
                    <?php }?>
                </div>
               

            </div>
            </div>
         <!-- /. PAGE WRAPPER  -->
       
    <div class="footer">

        </div>
</body>
</html>
