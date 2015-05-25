                <h2>Fiche de frais du mois <?php echo $numMois."-".$numAnnee ?></h2>
                <p>Etat : <strong><?php echo $libEtat ?> </strong> depuis le <strong><?php echo $dateModif ?> </strong><br> Montant validé : <strong><?php echo $montantValide ?> €</strong></p>
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
                        <?php foreach ($lesFraisForfait as $unFraisForfait ) {
                            $quantite = $unFraisForfait['quantite'];
                        ?>
                        <td class="qteForfait"><?php echo $quantite?> </td>
                        <?php
                        }
                        ?>
                    </tr>
                </table>

        <table class="table table-striped">
                   <caption>Descriptif des éléments hors forfait - <?php echo $nbJustificatifs ?> justificatif(s) reçu(s) -
               </caption>
                     <tr>
                        <th>Date</th>
                        <th>Libellé</th>
                        <th>Montant</th>
                     </tr>
                <?php
                  foreach ( $lesFraisHorsForfait as $unFraisHorsForfait )
                          {
                                $date = $unFraisHorsForfait['date'];
                                $libelle = $unFraisHorsForfait['libelle'];
                                $montant = $unFraisHorsForfait['montant'];
                        ?>
                     <tr>
                        <td><?php echo $date ?></td>
                        <td><?php echo $libelle ?></td>
                        <td><?php echo $montant ." €" ?></td>
                     </tr>
                <?php
                  }
                        ?>
            </table>
            </div>
        </div>
    </div>
</div>