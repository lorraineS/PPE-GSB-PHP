<h2>Fiche de frais du mois <?php echo $numMois."-".$numAnnee ?></h2>
       <p>Etat : <strong><?php echo $libEtat ?> </strong> depuis le <strong><?php echo $dateModif ?> </strong><br> Montant validé : <?php echo $montantValide ?></p>

<form method="POST"  action="index.php?uc=validerFrais&action=modifierFiche">
    <table class="table table-striped">
        <caption>Eléments forfaitisés </caption>
        <tr>
            <?php foreach ($lesFraisForfait as $unFraisForfait) {
                $libelle = $unFraisForfait['libelle'];
            ?>
            <th><?php echo $libelle; ?></th>
            <?php
            }
            ?>
        </tr>
        <tr>
            <?php foreach ($lesFraisForfait as $unFraisForfait) {
                $idFrais = $unFraisForfait['idfrais'];
                $quantite = $unFraisForfait['quantite'];
            ?>
            <td><input type="text" id="idFrais" name="lesFrais[<?php echo $idFrais?>]" value="<?php echo $quantite ?>" aria-describedby="sizing-addon1" class="form-control" ></td>
            <?php
            }
            ?>
        </tr>
    </table>
    <div class="form-group">
        <button id="ok" type="submit" class="btn btn-default"><i class="fa fa-check"></i> Modifier</button>
    </div>
</form>

<table class="table table-striped">
                   <caption>Descriptif des éléments hors forfait - <?php echo $nbJustificatifs ?> justificatif(s) reçu(s) -
               </caption>
                     <tr>
                        <th>Date</th>
                        <th>Libellé</th>
                        <th>Montant</th>
                        <th>Supprimer</th>
                        <th>Reporter au <?php echo "0" .($numMois + 1) . "/" . $numAnnee ?></th>
                     </tr>
                <?php
                  foreach ( $lesFraisHorsForfait as $unFraisHorsForfait )
                          {
                                $id = $unFraisHorsForfait['id'];
                                $date = $unFraisHorsForfait['date'];
                                $libelle = $unFraisHorsForfait['libelle'];
                                $montant = $unFraisHorsForfait['montant'];
                        ?>
                     <tr>
                        <td><?php echo $date ?></td>
                        <td><?php echo $libelle ?></td>
                        <td><?php echo $montant ." €" ?></td>
                        <td>
                            <a href="index.php?uc=validerFrais&action=supprimerFrais&idFrais=<?php echo $id ?>"
                               onclick="return confirm('Voulez-vous vraiment supprimer ce frais?');"><i class="fa fa-trash-o"></i>
                            </a>
                        </td>
                            <td>
                            <a href="index.php?uc=validerFrais&action=reporterFrais&idFrais=<?php echo $id ?>"
                               onclick="return confirm('Voulez-vous vraiment reporter ce frais?');"><i class="fa fa-share"></i>
                               </a>
                            </td>
                     </tr>
                <?php
                  }
                        ?>
            </table>
            </div>
            <div class="form-group">
            <a href="index.php?uc=validerFrais&action=validerFiche">
            <button id="ok" type="submit" class="btn btn-default"><i class="fa fa-check"></i> Valider définitivement cette fiche</button>
            </a>
            </div>
        </div>
    </div>
</div>
