<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/inscription.view.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <title><?= $titre ?></title>
</head>

<body>

    <div id="logo">
        <img href="<?= URL ?>accueil" id="img-logo" src="./public/img/logo/logo_CAEVersailles.jpg" alt="Logo Académie Versailles">
    </div>

    <div id="contenu" class="container">
        <div class="jumbotron">
            <h1 class="display-4">Candidaté au mouvement des maîtres</h1>
            <p class="lead">COMMISSION ACADÉMIQUE DE L'EMPLOI DE VERSAILLES</p>
            <hr class="my-4">
            <p>Secrétaire académique : Madame Albane de Laage (a.delaage@ddec78.fr) 01 30 83 05 03</p>
            <p>15 rue du Maréchal Joffre 78000 VERSAILLES</p>
        </div>



        <!-- Formulaire d'inscription -->
        <form id="form" action="<?= URL ?>inscription" method="POST" enctype="multipart/form-data">
            <label for="academie_origine">1. Académie d'origine :</label>
            <div class="form-group">
                <select class="custom-select" name="academie_origine">
                    <option selected>Selectionner votre réponse</option>
                    <option value="AIX-MARSEILLE">AIX-MARSEILLE</option>
                    <option value="AMIENS">AMIENS</option>
                    <option value="BESANCON">BESANCON</option>
                    <option value="BORDEAUX">BORDEAUX</option>
                    <option value="CAEN">CAEN</option>
                    <option value="CLERMONT-FERRAND">CLERMONT-FERRAND</option>
                    <option value="CORSE">CORSE</option>
                    <option value="DIJON">DIJON</option>
                    <option value="GRENOBLE">GRENOBLE</option>
                    <option value="CRETEIL">CRETEIL</option>
                    <option value="PARIS">PARIS</option>
                    <option value="LILLE">LILLE</option>
                    <option value="LIMOGES">LIMOGES</option>
                    <option value="LYON">LYON</option>
                    <option value="MONTPELLIER">MONTPELLIER</option>
                    <option value="NANCY-METZ">NANCY-METZ</option>
                    <option value="NANTES">NANTES</option>
                    <option value="NICE">NICE</option>
                    <option value="ORLEANS-TOURS">ORLEANS-TOURS</option>
                    <option value="POITIERS">POITIERS</option>
                    <option value="REIMS">REIMS</option>
                    <option value="RENNES">RENNES</option>
                    <option value="ROUEN">ROUEN</option>
                    <option value="STRASBOURG">STRASBOURG</option>
                    <option value="TOULOUSE">TOULOUSE</option>
                    <option value="GUYANE">GUYANE</option>
                    <option value="GUADELOUPE">GUADELOUPE</option>
                    <option value="MARTINIQUE">MARTINIQUE</option>
                    <option value="REUNION">REUNION</option>
                    <option value="ST PIERRE ET MIQUELON">ST PIERRE ET MIQUELON</option>
                    <option value="NOUVELLE CALEDONIE">NOUVELLE CALEDONIE</option>
                    <option value="POLYNESIE FRANCAISE">POLYNESIE FRANCAISE</option>
                    <option value="VERSAILLE">VERSAILLES</option>
                    <option value="WALLIS ET FUTUNA">WALLIS ET FUTUNA</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="numen">2. NUMEN : Il s'agit de votre Numéro d'identification de l’Éducation Nationale</label>
                <p>(Il se trouve dans votre dossier administratif. Si vous ne le connaissez pas, vous pouvez le demander auprès du secrétariat administratif de votre établissement. Il se compose de 13 caractères, toujours en majuscules)</p>
                <input type="text" class="form-control" name="numen" id="numen" placeholder="Exemple (inventé): 46G9987654XYZ">
            </div>
            <br>
            <div class="form-group">
                <label for="civilite_utilisateur">3. Civilité</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="civilite_utilisateur" id="monsieur" value="monsieur">
                    <label class="form-check-label" for="civilite_utilisateur">
                        Monsieur
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="civilite_utilisateur" id="madame" value="madame">
                    <label class="form-check-label" for="civilite_utilisateur">
                        Madame
                    </label>
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="nom_utilisateur">4. Nom :</label>
                <input type="text" class="form-control" name="nom_utilisateur" id="nom_utilisateur" placeholder="Saisir votre nom">
            </div>
            <br>
            <div class="form-group">
                <label for="prenom_utilisateur">5. Prénom :</label>
                <input type="text" class="form-control" name="prenom_utilisateur" id="prenom_utilisateur" placeholder="Saisir votre prénom">
            </div>
            <br>
            <div class="form-group">
                <label for="date_naissance_utilisateur">6. Date de naissance :</label>
                <input type="date" class="form-control" name="date_naissance_utilisateur" id="date_naissance_utilisateur">
            </div>
            <br>
            <div class="form-group">
                <label for="adresse_utilisateur">7. Adresse :</label>
                <input type="text" class="form-control" name="adresse_utilisateur" id="adresse_utilisateur" placeholder="Ex: 2 rue du palais">
            </div>
            <br>
            <div class="form-group">
                <label for="cp_utilisateur">8. Code postal :</label>
                <input type="number" class="form-control" name="cp_utilisateur" id="cp_utilisateur" placeholder="Ex: 75000">
            </div>
            <br>
            <div class="form-group">
                <label for="ville_utilisateur">9. Ville :</label>
                <input type="text" class="form-control" name="ville_utilisateur" id="ville_utilisateur" placeholder="Ex: PARIS">
            </div>
            <br>
            <div class="form-group">
                <label for="num_portable_utilisateur">10. Numéro de téléphone portable :</label>
                <p> (Il est impératif de pouvoir vous joindre par téléphone lors des opérations du mouvement des maîtres)</p>
                <input type="tel" class="form-control" name="num_portable_utilisateur" id="num_portable_utilisateur" placeholder="Saisir votre numéro de portable">
            </div>
            <br>
            <div class="form-group">
                <label for="num_domicile_utilisateur">11. Numéro de téléphone domicile :</label>
                <p> (Il est impératif de pouvoir vous joindre par téléphone lors des opérations du mouvement des maîtres)</p>
                <input type="tel" class="form-control" name="num_domicile_utilisateur" id="num_domicile_utilisateur" placeholder="Saisir votre numéro de domicile">
            </div>
            <br>
            <div class="form-group">
                <label for="email_utilisateur">12. Adresse électronique :</label>
                <p> (Attention !! cette adresse doit être correcte sans quoi vous devrez remplir à nouveau ce formulaire)</p>
                <input type="email" class="form-control" name="email_utilisateur" id="email_utilisateur" placeholder="Saisir votre adresse email">
            </div>
            <br>
            <div class="form-group">
                <label for="discipline_contrat">13. Discipline de contrat :</label>
                <input type="text" class="form-control" name="discipline_contrat" id="discipline_contrat" placeholder="Saisir votre discipline">
            </div>
            <br>
            <div class="form-group">
                <label for="nom_etbsmt_principal">14. Nom de votre établissement principal :</label>
                <p>(Il s'agit de l'établissement dans lequel vous avez le plus d'heures d'enseignement)</p>
                <input type="text" class="form-control" name="nom_etbsmt_principal" id="nom_etbsmt_principal" placeholder="Ex. Notre Dame">
            </div>
            <br>
            <div class="form-group">
                <label for="rne_etbsmt">15. *Indiquez le RNE de votre établissement principal :</label>
                Bouton en savoir plus
                <button type="button" data-toggle="modal" data-target="#info_rne">
                    ?
                </button>

                boite texte
                <div class="modal fade" id="info_rne" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Chaque établissement scolaire reconnu par l’éducation nationale (école, collège, lycée...) possède un code unique inscrit dans le répertoire national des établissements (RNE). On appelle ce code unique UAI pour Unité Administrative Immatriculée : il se compose de 7 chiffres et d’une lettre (exemple : 0950009E). Si vous ne le connaissez pas, vous pouvez demander ce code au secrétariat administratif de votre établissement ou consulter l'annuaire de l'éducation national à l'aide du lien ci-dessous. <a href="https://data.education.gouv.fr/explore/dataset/fr-en-annuaire-education/table/?disjunctive.nom_etablissement&disjunctive.type_etablissement&disjunctive.type_contrat_prive&disjunctive.code_type_contrat_prive&disjunctive.pial&disjunctive.appartenance_education_prioritaire" target="_blank">Annuaire de l'éducation national</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="text" class="form-control" name="rne_etbsmt" id="rne_etbsmt" placeholder="Ex. 0950809F">
            </div>
            <br>
            <div class="form-group">
                <label for="adresse_etbsmt">16. Adresse de l'établissement principal :</label>
                <input type="text" class="form-control" name="adresse_etbsmt" id="adresse_etbsmt" placeholder="Ex: 2 rue du palais">
            </div>
            <br>
            <div class="form-group">
                <label for="cp_etbsmt">17. Code postal de l'établissement principal :</label>
                <input type="number" class="form-control" name="cp_etbsmt" id="cp_etbsmt" placeholder="Ex: 75000">
            </div>
            <br>
            <div class="form-group">
                <label for="ville_etbsmt">18. Ville de l'établissement principal :</label>
                <input type="text" class="form-control" name="ville_etbsmt" id="ville_etbsmt" placeholder="Ex: PARIS">
            </div>
            <br>
            <div class="form-group">
                <label for="num_etbsmt">19. Numéro de téléphone de l'établissement principal :</label>
                <input type="tel" class="form-control" name="num_etbsmt" id="num_etbsmt" placeholder="Saisir le numéro de téléphone de l'établissement principal">
            </div>
            <br>
            <div class="form-group">
                <label for="academie_etbsmt">20. Académie de l'établissement principal :</label>
                <input type="text" class="form-control" name="academie_etbsmt" id="academie_etbsmt" placeholder="Ex: PARIS">
            </div>
            <br>

            <button class="btn btn-sinscrire" type="submit">Enregistrer</button>


        </form>
    </div>

    <!-- footer -->
    <div>
        <footer id="footer">
            <ul>
                <img src="./public/img/logo/logo_Versailles.jpg" alt="Logo Académie Versailles">
            </ul>
            <ul>
                <li>Nos engagement</li>
                <li>CGV</li>
                <li>Mentions légales</li>
                <li>Sitemap</li>
            </ul>
            <ul>
                <li>Qui somme-nous ?</li>
                <li>S'inscrire</li>
                <li>Nos partenaires</li>
                <li>F.A.Q</li>
            </ul>
            <ul>
                <li>Contacts</li>
                <pre>
15 rue du Maréchal Joffre
78000 VERSAILLES

Adresse mail : academie.versailles@gmail.com
Téléphone : 01-69-18-82-82
        </pre>
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
<!--             