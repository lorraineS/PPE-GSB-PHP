                <div class="page-header">
                    <h1>Renseigner ma fiche de frais du mois <?php echo $numMois."-".$numAnnee ?></h1>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <form method="POST" action="index.php?uc=gererFrais&action=validerMajFraisForfait">
                            <fieldset>
                                <legend>Eléments forfaitisés</legend>
                                    <?php
                                    // Ce tableau sert à définir les icones à utiliser en fonction des libellés
                                    $icons = array(
                                                'Etape' => 'fa fa-calendar',
                                                'Kilometrique' => 'fa fa-calendar',
                                                'Hotel' => 'fa fa-calendar',
                                                'Restaurant' => 'fa fa-cutlery'
                                            );

                                    foreach ($lesFraisForfait as $unFrais) {
                                        $idFrais = $unFrais['idfrais'];
                                        $libelle = $unFrais['libelle'];
                                        $quantite = $unFrais['quantite'];

                                        //$icon correspondra à la clé du tableau plus haut. La construire est en deux étapes:
                                        // 1. On décompose la chaine en array avec explode, ici le séparateur entre chaque élément de l'array créé est un espace.
                                        $icon = explode(' ', $unFrais['libelle']);
                                        // $icon est donc un tableau répondant à la structure suivante:
                                        // Array ( [0] => Forfait [1] => Etape )
                                        // Ici, on supprime les accents s'il y en a. Dans ce cas, le é et le ô.
                                        // Bien sûr, l'élément du libellé que l'on récupère est le second mot.
                                        $icon = str_replace(['é', 'ô'], ['e', 'o'], $icon[1]);
                                        // Avec les valeurs données plus haut, la valeur de $icon est maintenant 'Etape'

                                    ?>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon  input-group-addon-small">
                                                    <i class="<?php echo $icons[$icon] ?>">
                                                    <!-- On récupère la class de l'icone grâce à la variable icon, qui correspond maintenant forcement à une clé de l'array icons -->

                                                </i></span>
                                                <input type="text" id="idFrais" name="lesFrais[<?php echo $idFrais?>]" value="<?php echo $quantite ?>" aria-describedby="sizing-addon1" class="form-control">
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                            </fieldset>
                            <div class="form-group">
                                <button id="ok" type="submit" class="btn btn-default"><i class="fa fa-check"></i> Valider</button>
                           </div>
                        </form>
                    </div>