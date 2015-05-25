                <div class="page-header">
                    <h1>Mes fiches de frais</h1>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <form method="POST" action="index.php?uc=etatFrais&action=voirEtatFrais" form="form-inline">
                            <fieldset>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Sélectionner un mois</span>
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
                            </fieldset>
                            <div class="form-group">
                                <input id="ok" type="submit" value="Valider" class="btn btn-default">
                            </div>
                        </form>
                    </div>
                </div>
