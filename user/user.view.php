<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../public/css/user.view.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <title><?= $titre ?></title>
</head>

<body>
    <header>
        <!-- nav bar -->
        <nav id="nav-top" class="navbar navbar-expand-md navbar-dark fixed">

            <img src="../public/img/logo/logo_Versailles.jpg" class="" alt="logo-CAE">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">


                </ul>

                <div class="d-flex bd-highlight mb-3" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <?php
                        if (empty($_SESSION['utilisateur'])) :
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="">S'inscrire</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?= URL ?>login">Connexion</a>
                            </li>


                        <?php else : ?>
                            <div class="d-flex bd-highlight mb-3">
                                <div id="compte" class="ml-auto p-2 bd-highlight"><a class="btn" href="<?= URL ?>compte/profile">Mon compte</a></div>
                                <div id="deco" class="ml-auto p-2 bd-highlight"><a class="btn" href="<?= URL ?>compte/deconnexion">Se d??connecter</a></div>
                            </div>
                        <?php endif; ?>
                    </ul>

                </div>
        </nav>
    </header>
    <?php
    if (isset($_SESSION["alert"])) :
    ?>

      <div class="alert alert-<?= $_SESSION["alert"]["type"] ?>" role="alert">
        <?= $_SESSION["alert"]["msg"] ?>
      </div>

    <?php
    endif;
    unset($_SESSION["alert"]);
    ?>


    <div class="contenu">
        <!-- Head -->
        <div id="head">
            <div class="info-utilisateur">
                <hr>
                <h3>Mouvement des ma??tres du 2nd degr??</h3>
                <hr>
                <div class="icone">
                    <img src="../public/img/utilisateur/icone-utilisateur.png" class="" alt="Icone">
                    <div class="info-utilisateur">
                        <p><?= $tableau->getCivilite_utilisateur() ?> <?php if ($tableau->getCivilite_utilisateur() === "Madame") {
                                                                            echo $tableau->getNom_naissance_utilisateur();
                                                                        } ?> <?= $tableau->getNom_utilisateur() ?> <?= $tableau->getPrenom_utilisateur() ?></p>
                        <p>N??e le : <?= $tableau->getDate_naissance_utilisateur() ?></p>
                    </div>

                </div>
            </div>

            <div id="actu-utilisateur">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Titre actualit??</h5>
                        <p class="card-text">Description acutalit?? : Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur nostrum architecto deleniti ipsam molestias animi saepe atque reprehenderit debitis maxime.</p>
                        <a href="#" class="btn btn-option">En savoir plus</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="contenu-espacePerso">

            <div class="slide1">
                <!-- <a id="btn-espacePerso" href="#">Espace personnel</a> -->
                <div id="btn-faireDemande">
                    <a href="<?= URL ?>compte/demandeMutation/<?= $tableau->getId_utilisateur() ?>">Faire une demande de mutation</a>
                </div>
            </div>
            <hr>


            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="info-perso" data-toggle="tab" href="#contenu-info-perso" role="tab" aria-controls="home" aria-selected="true">Info personnel</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="adresse" data-toggle="tab" href="#contenu-adresse" role="tab" aria-controls="profile" aria-selected="false">Adresse</a>
                </li>
                <?php
                if (!empty($etbsmt_principal)) {
                ?>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="etbsmt-principal" data-toggle="tab" href="#contenu-etbsmt-principal" role="tab" aria-controls="profile" aria-selected="false">??tablissement principal</a>
                    </li>
                <?php
                }
                ?>
                <?php
                if (!empty($demandes)) {
                ?>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="voeux-user" data-toggle="tab" href="#contenu-voeux-user" role="tab" aria-controls="profile" aria-selected="false">Souhait mutation</a>
                    </li>
                <?php
                }
                ?>
            </ul>
            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active" id="contenu-info-perso" role="tabpanel" aria-labelledby="info-perso">
                    <div class="info-perso">
                        <div class="info-utilisateur">
                            <p>Acad??mie d'origine : <input type="text" placeholder="<?= $tableau->getAcademie_origine() ?>" disabled></p>
                            <p>Numen : <input type="text" placeholder="<?= $tableau->getNumen() ?>" disabled></p>
                            <p>Adresse email : <input type="text" placeholder="<?= $tableau->getEmail_utilisateur() ?>" disabled></p>
                            <p>Num??ro de t??l??phone portable : <input type="text" placeholder="<?= $tableau->getNum_portable_utilisateur() ?>" disabled></p>
                            <p>Num??ro de t??l??phone domicile : <input type="text" placeholder="<?= $tableau->getNum_domicile_utilisateur() ?>" disabled></p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contenu-adresse" role="tabpanel" aria-labelledby="adresse">
                    <div class="info-perso">
                        <div class="info-utilisateur">
                            <p>Adresse : <input type="text" placeholder="<?= $tableau->getAdresse_utilisateur() ?>" disabled></p>
                            <p>Code postale : <input type="text" placeholder="<?= $tableau->getCp_utilisateur() ?>" disabled></p>

                            <div class="desktop-p">
                                <p>Ville : <input type="text" placeholder="<?= $tableau->getVille_utilisateur() ?>" disabled></p>
                            </div>
                            <div class="mobile-p">
                                <p>Ville : </p>
                                <input type="text" placeholder="<?= $tableau->getVille_utilisateur() ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contenu-etbsmt-principal" role="tabpanel" aria-labelledby="etbsmt-principal">
                    <div class="info-perso">
                        <div class="info-utilisateur">
                            <p>RNE de l'??tablissement : <input type="text" placeholder="<?= $etbsmt_principal["rne_etbsmt"] ?>" disabled></p>
                            <p>Academie de l'??tablissement: <input type="text" placeholder="<?= $etbsmt_principal["academie_etbsmt"] ?>" disabled></p>
                            <p>Nom de l'??tablissement : <input type="text" placeholder="<?= $etbsmt_principal["nom_etbsmt_principal"] ?>" disabled></p>
                            <p>Adresse de l'??tablissement : <input type="text" placeholder="<?= $etbsmt_principal["adresse_etbsmt"] ?>" disabled></p>
                            <p>code postal de l'??tablissement : <input type="text" placeholder="<?= $etbsmt_principal["cp_etbsmt"] ?>" disabled></p>
                            <p>Ville de l'??tablissement : <input type="text" placeholder="<?= $etbsmt_principal["ville_etbsmt"] ?>" disabled></p>
                            <p>Num??ro de l'??tablissement : <input type="text" placeholder="<?= $etbsmt_principal["num_etbsmt"] ?>" disabled></p>
                            <p>Email de l'??tablissement : <input type="text" placeholder="<?= $etbsmt_principal["email_etbsmt"] ?>" disabled></p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contenu-voeux-user" role="tabpanel" aria-labelledby="voeux-user">

                    <?php
                    $i = 1;
                    $html = "<div class='info-utilisateur'>";

                    foreach ($demandes as $demande) {


                    if(!empty($demande["voeux"])){
                        foreach ($demande["voeux"] as $voeux) {

                                // var_dump($demande["voeux"]);


                            
                            $html .= "
                                    <fieldset class='info-voeux'>
                                        <div class='info-utilisateur'>
                                            <h4>Souhait num??ro " . $i . " | Fait le " . $demande["date_demande"] . " Demande N??".$demande['id_mutation']."</h4>
                                            <hr>
                                            <button type='button' class='btn btn-jaune' data-toggle='modal' data-target='#modal-modification-" . $voeux["id_voeux"] . "'>Modifier mon souhait</button>
                                            <button type='button' class='btn btn-sinscrire' data-toggle='modal' data-target='#modal-suppression-" . $voeux["id_voeux"] . "'>Supprimer mon souhait</button>

                                            <hr>";

                                            if(empty($voeux["justificatif_motif"])){
                                               $html .="<h4>Il vous manque un justificatif pour la raison : " . $voeux['motif_demande'] ."</h4>";
                                            }

                            $html .="</div>

                                        <div>
                                            <p>Academie souhait?? : <input type='text' placeholder='" . $voeux["academie_souhaite"]  . "' disabled></p>
                                            <p>1er d??partement souhait?? : <input type='text' placeholder='" . $voeux["choix1"] . "' disabled></p>
                                            <p>2eme d??partement souhait?? : <input type='text' placeholder='" . $voeux["choix2"] . "' disabled></p>
                                            <p>3eme d??partement souhait?? : <input type='text' placeholder='" . $voeux["choix3"] . "' disabled></p>
                                            <p>4eme d??partement souhait?? : <input type='text' placeholder='" . $voeux["choix4"] . "' disabled></p>
                                            <p>5eme d??partement souhait?? : <input type='text' placeholder='" . $voeux["choix5"] . "' disabled></p>
                                            <p>Nombre d'heures souhait?? : <input type='text' placeholder='" . $voeux["nb_heures_souhaite"] . "' disabled></p>
                                            <p>Motif de la demande : <input type='text' placeholder='" . $voeux["motif_demande"] . "' disabled></p>
                                            

                                            <!-- Modal -->
                                            <div class='modal fade' id='modal-modification-" . $voeux["id_voeux"] . "' tabindex='0' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                <div class='modal-dialog'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <h5 class='modal-title' id='exampleModalLabel'>Modifier mon souhait</h5>
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class='modal-body'>
                                                        <!-- Formulaire de modification -->
                                                            <form id='form' action='" . URL . "compte/modifierSouhait/" . $voeux["id_voeux"] . "' method='POST' enctype='multipart/form-data'>

                                                                <div class='col form-group'>
                                                                    <label for='academie-souhaite'>Acemie souhaite :</label>
                                                                    <input type='text' name='academie_souhaite' class='form-control' id='academie-souhaite' value='" .  $voeux["academie_souhaite"] . "'>
                                                                </div>
                
                                                                <div id='dept-souhaite' class='row'>
                                                                    <div class='col form-group'>
                                                                        <label for='dept-souhaite1'>D??partement souhait?? n?? 1 :</label>
                                                                        <input type='text' class='form-control' id='1er-dept' name='1er_dept' value='" .  $voeux["choix1"] . "'>
                                                                    </div>
                                                                    <div class='col form-group'>
                                                                        <label for='dept-souhaite2'>D??partement souhait?? n?? 2 :</label>
                                                                        <input type='text' class='form-control' id='2eme-dept' name='2eme_dept' value='" .  $voeux["choix2"] . "'>
                                                                    </div>
                                                                    <div class='col form-group'>
                                                                        <label for='dept-souhaite3'>D??partement souhait?? n?? 3 :</label>
                                                                        <input type='text' class='form-control' id='3eme-dept' name='3eme_dept' value='" .  $voeux["choix3"] . "'>
                                                                    </div>
                                                                    <div class='col form-group'>
                                                                        <label for='dept-souhaite4'>D??partement souhait?? n?? 4 :</label>
                                                                        <input type='text' class='form-control' id='4eme-dept' name='4eme_dept' value='" .  $voeux["choix4"] . "'>
                                                                    </div>
                                                                    <div class='col form-group'>
                                                                        <label for='dept-souhaite5'>D??partement souhait?? n?? 5 :</label>
                                                                        <input type='text' class='form
                                                                        -control' id='5eme-dept' name='5eme_dept' value='" . $voeux["choix5"] . "'>
                                                                    </div>
                                                                </div>
                                                                <div class='row'>
                                                                    <div class='col form-group'>
                                                                        <label for='type-contrat-souhaite'>40. Type de contrat souhait?? :</label>
                                                                        <select class='custom-select' id='type-contrat-souhaite' name='type_contrat_souhaite'>
                                                                            <option ".($voeux["motif_demande"] == 'Temps complet' ? 'selected':'')." value='Temps complet'>Temps complet</option>
                                                                            <option ".($voeux["motif_demande"] == 'Temps partiel' ? 'selected':'')."  value='Temps partiel'>Temps partiel</option>
                                                                            <option ".($voeux["motif_demande"] == 'Temps partiel et temps partiel' ? 'selected':'')." value='Temps partiel et temps partiel'>Temps partiel et temps partiel</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class='col form-group'>
                                                                        <label for='nb-heures-souhaite'>6. Nombre d'heures souhait?? :</label>
                                                                        <input type='text' class='form-control' id='nb-heures-souhaite' name='nb_heures_souhaite' value='" . $voeux["nb_heures_souhaite"] . "'>
                                                                    </div>
                                                                </div>
                                                                <div class='row'>
                                                                    <div class='col form-group'>
                                                                        <label for='motif-demande'>38. Motif de la demande :</label>
                                                                        <select class='custom-select' id='motif-demande' name='motif_demande'>
                                                                            <option ".($voeux["motif_demande"] == 'Imp??ratifs familiaux' ? 'selected':'')." value='Imp??ratifs familiaux'>Imp??ratifs familiaux</option>
                                                                            <option ".($voeux["motif_demande"] == 'Raisons m??dicales' ? 'selected':'')." value='Raisons m??dicales'>Raisons m??dicales</option>
                                                                            <option ".($voeux["motif_demande"] == 'Vie religieuse' ? 'selected':'')." value='Vie religieuse'>Vie religieuse</option>
                                                                            <option ".($voeux["motif_demande"] == 'Autre' ? 'selected':'')." value='Autre'>Autre</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class='col form-group'>
                                                                        <label for='autre_motif'>Si 'Autre', vous avez la possibilit?? d'expliquer le motif :</label>
                                                                        <input type='text' class='form-control' id='autre-motif' name='autre_motif' value='" . $voeux["autre_motif"] . "'>
                                                                    </div>
                                                                </div>
                                                                <div class='form-group'>
                                                                    <label for='justificatif-motif'>39. Joindre votre justificatif de motif de demande :</label><br>
                                                                    <input type='file' class='form-control' id='justificatif-motif' name='justificatif_motif'>
                                                                    <!-- <input type='file' name='justificatif_motif' id='justificatif-motif' accept='application/pdf, application/docx, application/doc, application/odt' title='Taille maximale autoris??e: 2Mo'> -->
                                                                    <!-- S??CURIT?? ANTI BOT -->
                                                                    <!-- <input type='hidden' name='MAX_FILE_SIZE' value='2097152'> -->
                                                                </div>
                                                                <div class='modal-footer'>
                                                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fermer</button>
                                                                    <button type='submit' class='btn btn-sinscrire'>Modifier</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal -->
                                            <div class='modal fade' id='modal-suppression-" . $voeux["id_voeux"] . "' tabindex='0' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                <div class='modal-dialog'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <h5 class='modal-title' id='exampleModalLabel'>Supprimer mon souhait</h5>
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class='modal-body'>
                                                        <form id='form' action='" . URL . "compte/supprimerSouhait/" . $voeux["id_voeux"] . "'>
                                                                <p>Etes-vous sur de vouloir supprimer votre voeux ?
                                                                <div class='modal-footer'>
                                                                    <button type='button' class='btn btn-option' data-dismiss='modal'>Fermer</button>
                                                                    <button type='submit' class='btn btn-sinscrire'>Supprimer</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>";
                            $i++;
                        }
                    }
                    }
                    $html .= "</div>";
                    echo $html;
                    ?>

                </div>
            </div>

        </div>

        <!-- Archive utilisateur -->
        <!-- <div class="slide">
            <a id="btn-archive" href="#">Demande en cours</a>
        </div> -->
        <?php
        if (!empty($demandes)) {
            // var_dump($info);
            $html = "<table class='table table-striped table-hover table-dark'>
                        <thead>
                            <tr>
                                <th id='table_date'>Numero demande</th>
                                <th id='table_date'>Date demande</th>
                                <th id='table_date2'> <img src='../public/img/calender.svg' alt='calendrier'></th>
                                <th>Type demande</th>
                                <th>Academie souhait??e</th>
                                <th class='document'>Document demande</th>
                            </tr>
                        </thead>
                        <tbody>
                        ";
            foreach ($demandes as $demande) {
                if (!empty($demande["voeux"])) {


                    foreach ($demande["voeux"] as $voeux) {


                        $html .= "<tr>
                    <td>" . $demande["id_mutation"] . "</td>
                    <td>" . $demande["date_demande"] . "</td>
                    <td>" . $demande["type_mutation"] . "</td>
                    <td>" . $voeux["academie_souhaite"] . "</td>

                    </tr> ";
                    }
                }else{
                    $supprim=$this->supprimerDemande($demande['id_mutation']);
                }
            }
            $html .= "</tbody>
                    </table>";
            echo $html;
        }
        ?>
    </div>


    <!-- footer -->
    <div>
        <footer id="footer">
            <ul>
                <img src="../public/img/logo/logo_Versailles.jpg" alt="Logo Acad??mie Versailles">
            </ul>
            <ul>
                <li>Nos engagements</li>
                <li>CGV</li>
                <li>Mentions l??gales</li>
                <li>Sitemap</li>
            </ul>
            <ul>
                <li>Qui sommes-nous ?</li>
                <li>S'inscrire</li>
                <li>Nos partenaires</li>
                <li>F.A.Q</li>
            </ul>
            <ul>
                <li>Contacts</li>
                <div>
                    15 rue du Mar??chal Joffre
                    78000 VERSAILLES

                    Adresse mail : academie.versailles@gmail.com
                    T??l??phone : 01-69-18-82-82
                </div>
            </ul>
        </footer>
    </div>



    <!-- FOOTER -->
    <footer id="footer2">
        <p class="float-right"><a href="#">Haut de page</a></p>
        <p>&copy; 2017-2021 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
    </footer>


</body>

</html>