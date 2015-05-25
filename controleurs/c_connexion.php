<?php
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
switch($action){
	case 'demandeConnexion':{
		include("vues/v_connexion.php");
		break;
	}
	case 'valideConnexion':{
		$login = $_REQUEST['login'];
		$mdp = $_REQUEST['mdp'];
		$utilisateur = $pdo->getInfosUtilisateur($login,$mdp);
		if(!is_array( $utilisateur)){
			ajouterErreur("Login ou mot de passe incorrect");
			include("vues/v_erreurs.php");
			include("vues/v_connexion.php");
		}
		else {
			$id = $utilisateur['id'];
			$type = $utilisateur['type'];
			$nom =  $utilisateur['nom'];
			$prenom = $utilisateur['prenom'];
			connecter($id, $type, $nom, $prenom);
                    		include("vues/v_nav.php");

                        	if($type == 'comptable') {
                        		include("vues/v_sommaire_c.php");
	                        	include("vues/v_accueil_c.php");
	                     } else {
	                     	include("vues/v_sommaire_v.php");
	                        	include("vues/v_accueil_v.php");
	                     }
		}
		break;
	}
	default :{
		include("vues/v_connexion.php");
		break;
	}
}
?>