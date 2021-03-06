<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
        <link rel="stylesheet" href="../site/css/main.css">
		
		<meta name="author" content="Alexandre Mayer">
	</head>
    <?php
                require_once("../lib/MySqliLib.class.php");
				require_once("../modeles/Preference.class.php");
				require_once("../lib/TypeException.class.php");

    ?>
	<body>
		<div>
			<header>
				<h1>test_classe_Preference</h1>
			</header>

			<div>
				<h2>charger les preference d'un utilisateur() </h2>
				<?php

				try{
                    var_dump(Preference::chargerPreference(6)['sTypePolice']);
                    var_dump(Preference::chargerPreference(6)['sTaillePolice']);
                    var_dump(Preference::chargerPreference(6)['sCouleurPolice']);
                    var_dump(Preference::chargerPreference(6)['sCouleurFond']);
                    var_dump(Preference::chargerPreference(6)['idUtilisateur']);
                    
				}catch(Exception $e){
					echo "<p>".$e->getMessage()."</p>";
				}
				?>
                
                
                <h2>Sauvegarder les preference d'un utilisateur() </h2>
				<?php

				try{
                    Preference::sauvegarderPreference(1, "lol", "lol", "lol", "lol", "lol");
                    
				}catch(Exception $e){
					echo "<p>".$e->getMessage()."</p>";
				}
				?>
                
                 <h2>afficher oeuvres a l'accueil() </h2>
				<?php

				try{
                    VueAccueil::afficherOeuvresAccueil();
                    
				}catch(Exception $e){
					echo "<p>".$e->getMessage()."</p>";
				}
				?>
				
				
				
				
			</div>

			<footer>
				<p>
					&copy; Copyright  by Alexandre Mayer
				</p>
			</footer>
		</div>
	</body>
</html>
