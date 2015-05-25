<?php
include("vues/v_nav.php");
include("vues/v_sommaire_c.php");
$action = $_REQUEST['action'];
switch($action){
    case 'voirVisiteur':{
        $lesVisiteurs=$pdo->getLesVisiteursARembourser();
        include("vues/v_listeSuiviVisiteurs.php");
        break;
    }
    case 'voirFicheValidees':{
        $leVisiteur = $_REQUEST['lstVisiteur'];
        $_SESSION['leVisiteur'] = $leVisiteur;
        $leMois = $_POST['lstMois'];
        $_SESSION['lstMois'] = $leMois;
        $lesVisiteurs=$pdo->getLesVisiteursARembourser();
        $lesMois=$pdo->getLesMoisDisponiblesARembourser($leVisiteur);
        $visiteurASelectionner = $leVisiteur;
        $moisASelectionner = $leMois;
        include("vues/v_listeSuiviVisiteurs.php");
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
        include ("vues/v_remboursementFrais.php");
        break;
    }

    case 'paiementFiche': {
        $leVisiteur = $_SESSION['leVisiteur'];
        $leMois = $_SESSION['leMois'];
        $pdo -> majEtatFicheFrais($leVisiteur,$leMois,"RB");
        if($idEtat = "RB") {
             ajouterErreur("La fiche a été mise en paiement !");
             include("vues/v_erreurs_info.php");
        }

        break;
    }

}
?>