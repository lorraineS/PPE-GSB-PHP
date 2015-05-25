                    <div class="col-md-6">
                        <form action="index.php?uc=gererFrais&action=validerCreationFrais" method="post">
                            <fieldset>
                                <legend>Nouvel élément hors forfait</legend>
                                <div class="form-group">
                                    <div class="input-group input-group">
                                        <span class="input-group-addon input-group-addon-small"><i class="fa fa-calendar"></i></span>
                                        <input type="text" id="txtDateHF" name="dateFrais" size="10" maxlength="10" value="" placeholder="05/12/2015" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon  input-group-addon-small"><i class="fa fa-bars"></i></span>
                                        <input type="text" id="txtLibelleHF" name="libelle" size="70" maxlength="256" value="" placeholder="Voyage SNCF, location équipement vidéo/sonore..." class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon  input-group-addon-small"><i class="fa fa-eur"></i></span>
                                        <input type="text" id="txtMontantHF" name="montant" size="10" maxlength="10" value="" placeholder="26.50" class="form-control">
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group">
                                <button id="ok" type="submit" class="btn btn-default"><i class="fa fa-check"></i> Valider</button>
                                <button id="annuler" type="reset" class="btn btn-default"><i class="fa fa-times"></i> Réinitialiser les champs</button>
                            </div>
                        </form>
                    </div>
                </div>

                <br>

                <table class="table">
                    <caption>Descriptif des éléments hors forfait</caption>
                    <tr>
                        <th>Date</th>
                        <th>Libellé</th>
                        <th>Montant</th>
                        <th>&nbsp;</th>
                    </tr>
                    <?php foreach( $lesFraisHorsForfait as $unFraisHorsForfait) {
                        $libelle = $unFraisHorsForfait['libelle'];
                        $date = $unFraisHorsForfait['date'];
                        $montant= $unFraisHorsForfait['montant'];
                        $id = $unFraisHorsForfait['id'];
                    ?>
                    <tr>
                        <td> <?php echo $date ?></td>
                        <td><?php echo $libelle ?></td>
                        <td><?php echo $montant ." €" ?></td>
                        <td>
                            <a href="index.php?uc=gererFrais&action=supprimerFrais&idFrais=<?php echo $id ?>"
                               onclick="return confirm('Voulez-vous vraiment supprimer ce frais?');">Supprimer ce frais
                            </a>
                        </td>
                     </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>

