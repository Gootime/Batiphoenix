<!DOCTYPE html>
<html>
<head>
	<title>Log Temporaire</title>
</head>
<body>
	<form action="action/action.signup.php" method="post">
		<input type="text" name="nom" placeholder="Nom" autofocus required><br>
		<input type="text" name="prenom" placeholder="Prénom" autofocus required><br>
		<input type="mail" name="mail" placeholder="Adresse Email" autofocus required><br>
		<input type="text" name="societe" placeholder="Société" autofocus required><br>
		<input type="text" name="fonction" placeholder="Fonction" autofocus required><br>
		<input type="text" name="telephone" placeholder="Téléphone" autofocus required><br>
		<input type="password" name="pass" placeholder="Mot de passe" required><br>
		<input type="password" name="passconfirm" placeholder="Confirmer le mot de passe" required><br>
                <input id="checkboxcgu" type="checkbox" name="checkbox"><br>
		<input type="submit" value="Connexion">
<!--            <input type="mail" name="mail" placeholder="Adresse Email" autofocus required><br>
            <input type="password" name="pass" placeholder="Mot de passe" required><br>
            <input type="submit" value="Connexion"> -->
	</form>
</body>
</html>