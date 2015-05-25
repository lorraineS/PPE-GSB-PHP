                <div class="page-header">
                    <h1>Suivi des fiches de frais de :</h1>
                </div>
                <div class="row">
                    <form method="POST" action="index.php?uc=suivreFrais&action=voirFicheValidees" form="form-inline">
                        <fieldset>
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon  input-group-addon-small"><i class="fa fa-users"></i></span>
                                    <select id="lstVisiteur" name="lstVisiteur" aria-describedby="sizing-addon1" class="form-control">
                                        <?php foreach ($lesVisiteurs as $unVisiteur){
                                            $idVisiteur = $unVisiteur['id'];
                                            $nomVisiteur =  $unVisiteur['nom'];
                                            $prenomVisiteur =  $unVisiteur['prenom'];
                                            if($idVisiteur == $visiteurASelectionner){
                                        ?>
                                        <option selected value="<?php echo $idVisiteur ?>"><?php echo  $prenomVisiteur." ".$nomVisiteur ?> </option>
                                        <?php
                                        } else {
                                        ?>
                                        <option value="<?php echo $idVisiteur ?>"><?php echo  $prenomVisiteur." ".$nomVisiteur ?> </option>
                                        <?php
                                        }

                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="input-group">
                                    <span class="input-group-addon  input-group-addon-small"><i class="fa fa-calendar"></i></span>
                                    <select id="lstMois" name="lstMois" aria-describedby="sizing-addon1" class="form-control">
                                        <?php foreach ($lesMois as $unMois) {
                                            $mois = $unMois['mois'];
                                            $numAnnee =  $unMois['numAnnee'];
                                            $numMois =  $unMois['numMois'];
                                            if($mois == $moisASelectionner){
                                        ?>
                                        <option selected value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
                                        <?php
                                        } else {
                                        ?>
                                        <option value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
                                        <?php
                                        }

                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        <input id="ok" type="submit" value="Valider" class="btn btn-default"/>
                        </fieldset>
                    </form>
                </div>
