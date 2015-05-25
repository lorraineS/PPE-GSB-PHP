<?php
include("vues/v_nav.php");
include("vues/v_sommaire_c.php");
$action = $_REQUEST['action'];
switch($action){
    case 'voirVisiteur':{
        $lesVisiteurs=$pdo->getLesVisiteurs();
        include("vues/v_listeVisiteurs.php");
        break;
    }
    case 'voirEtatFiche':{
        $leVisiteur = $_REQUEST['lstVisiteur'];
        $_SESSION['leVisiteur'] = $leVisiteur;
        $leMois = $_POST['lstMois'];
        $_SESSION['leMois'] = $leMois;
        $lesVisiteurs=$pdo->getLesVisiteurs();
        $lesMois=$pdo->getLesMoisDisponibles($leVisiteur);
        $visiteurASelectionner = $leVisiteur;
        $moisASelectionner = $leMois;
        include("vues/v_listeVisiteurs.php");
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($leVisiteur,$leMois);
        $lesFraisForfait= $pdo->getLesFraisForfait($leVisiteur,$leMois);
        $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($leVisiteur,$leMois);
        $numAnnee =substr( $leMois,0,4);
        $_SESSION['numAnnee']=$numAnnee;
        $numMois =substr( $leMois,4,2);
        $_SESSION['numMois']=$numMois;
        $idEtat = $lesInfosFicheFrais['idEtat'];
        $libEtat = $lesInfosFicheFrais['libEtat'];
        $montantValide = $lesInfosFicheFrais['montantValide'];
        $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
        $dateModif =  $lesInfosFicheFrais['dateModif'];
        $dateModif =  dateAnglaisVersFrancais($dateModif);
        if($idEtat == 'CL') {
            // si l'etat de la fiche est en CR (= saisie en cours) alors le comptable peut modififier les champs
            include("vues/v_modifListeFraisForfait.php");
        } else {
            include("vues/v_etatFrais.php");
        }
        break;
    }

   case 'modifierFiche': {
        $leVisiteur = $_SESSION['leVisiteur'];
        $leMois = $_SESSION['leMois'];
        $lesFrais = $_REQUEST['lesFrais'];
        $lesVisiteurs = $pdo->getLesVisiteurs();
        $visiteurASelectionner = $leVisiteur;
        $lesMois=$pdo->getLesMoisDisponibles($leVisiteur);
        $moisASelectionner = $leMois;
        include("vues/v_listeVisiteurs.php");
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($leVisiteur,$leMois);
        $lesFraisForfait= $pdo->getLesFraisForfait($leVisiteur,$leMois);
        $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($leVisiteur,$leMois);
        $numAnnee =substr( $leMois,0,4);
        $numMois =substr( $leMois,4,2);
        $idEtat = $lesInfosFicheFrais['idEtat'];
        $libEtat = $lesInfosFicheFrais['libEtat'];
        $montantValide = $lesInfosFicheFrais['montantValide'];
        $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
        $dateModif =  $lesInfosFicheFrais['dateModif'];
        $dateModif =  dateAnglaisVersFrancais($dateModif);
        if (lesQteFraisValides($lesFrais)) {
            $pdo->majFraisForfait($leVisiteur, $leMois, $lesFrais);
             ajouterErreur("Les éléments forfaitisés on été modifiés !");
             include("vues/v_erreurs_info.php");
             //include("vues/v_modifListeFraisForfait.php");
        }
        //include("vues/v_etatFrais.php");
        break;
    }

    case 'reporterFrais':{
        $leVisiteur = $_SESSION['leVisiteur'];
        $leMois = $_SESSION['leMois'];
        $idFrais = $_REQUEST['idFrais'];
        $pdo->reporterFrais($idFrais, $leVisiteur, $leMois);
        ajouterErreurInfo("Le Frais a bien été reporté");
        include("vues/v_erreurs_info.php");
        break;
    }

    case 'supprimerFrais':{
        $idFrais = $_REQUEST['idFrais'];
        $pdo->supprimerFraisHorsForfait($idFrais);
        ajouterErreur("Le frais a bien été supprimé !");
         include("vues/v_erreurs_info.php");
        break;
    }

    case 'validerFiche': {
        $leVisiteur = $_SESSION['leVisiteur'];
        $leMois = $_SESSION['leMois'];
        $lesFrais = $_REQUEST['lesFrais'];
        $pdo -> majEtatFicheFrais($leVisiteur,$leMois,"VA");
        $idEtat = $lesInfosFicheFrais['idEtat'];
        $libEtat = $lesInfosFicheFrais['libEtat'];
        if($idEtat = "VA") {
             ajouterErreur("La fiche a été validé !");
             include("vues/v_erreurs_info.php");
        }

        break;
    }

}
?>