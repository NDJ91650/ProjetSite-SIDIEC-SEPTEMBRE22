<?php
require "./models/dbConnect.class.php";
require "./models/user/user.class.php";
require "./models/user/userManager.class.php";
require "./models/user/etablissement.class.php";





class UserController extends AbstractController
{

    private $user;
    private $base;
    private $utilisateur;
    private $etbsmt;
    // private $securityController;

    public function __construct()
    {
        $this->base = new Dbconnect();
        $this->user = new UserManager($this->base);
        $this->utilisateur = new User();
        $this->etbsmt = new Etablissement();
        // $this->securityController = new SecurityController;

        // $this->formulaire=new Formulaire;
    }

    public function validation()
    {
        $data = SecurityController::checkData();
        // var_dump($data);
        $this->utilisateur->setIdentifiant_utilisateur($data["identifiant_utilisateur"]);
        $this->utilisateur->setMdp_utilisateur($data["mdp_utilisateur"]);
        // var_dump($data);

        $connexion = $this->user->verificationMdp($this->utilisateur->getIdentifiant_utilisateur(), $this->utilisateur->getMdp_utilisateur());
        // var_dump($connexion);

        if ($connexion) {
            // $this->utilisateur->getIdentifiant_utilisateur();
            // self::MessageAlerte("Connexion réussi", self::VERT);
            $_SESSION["utilisateur"] = [
                "identifiant_utilisateur" => $this->utilisateur->getIdentifiant_utilisateur()
            ];
            header("location: " . URL . "compte/profile");
            // } else {
            //     self::MessageAlerte("Attention compte non activé", self::ROUGE);
            //     header("location: " . URL . "creerCompte");
            // }
        } else {
            self::MessageAlerte("Erreur identifiant ou mot de passe !", self::ROUGE);
            header("location: ".URL."accueil");
        }
    }

    public function profile(){
        $donnee = $this->user->getInfosUser($_SESSION["utilisateur"]["identifiant_utilisateur"]);
        $demandes = $this->user->getDemande_user2($donnee->getId_utilisateur());
        $etbsmt_principal = $this->user->getEtbsmt_principal($donnee->getId_utilisateur());
        $data = [
            'titre' => "Mon profile",
            'tableau' => $donnee,
            'etbsmt_principal' => $etbsmt_principal,
            'demandes' => $demandes,
            'view' => "views/user/user.view.php"
        ];
        $this->genererPage($data);
    }

    public function formulaireMutation(){
        $donnee = $this->user->getInfosUser($_SESSION["utilisateur"]["identifiant_utilisateur"]);
        $data = [
            'titre' => "Demande de mutation",
            'tableau' => $donnee,
            'view' => "views/user/formulaireMutation.php"
        ];
        $this->genererPage($data);
    }

    public function deconnexion()
    {
        unset($_SESSION["utilisateur"]);
        self::MessageAlerte("Vous avez été déconnecté", self::VERT);
        header("location: " . URL . "accueil");
    }

    public function demandeMutation($id_utilisateur)
    {
        $data = SecurityController::checkData();
        // var_dump($data);
        
        $rne_etbsmt = $data["rne_etbsmt"];
        $academie_etbsmt = $data["academie_etbsmt"];
        $nom_etbsmt_principal = $data["nom_etbsmt_principal"];
        $adresse_etbsmt = $data["adresse_etbsmt"];
        $cp_etbsmt = $data["cp_etbsmt"];
        $ville_etbsmt = $data["ville_etbsmt"];
        $num_etbsmt = $data["num_etbsmt"];
        $email_etbsmt = $data["email_etbsmt"];
        $etbsmt_laic = $data["statut_etbsmt"];
        $nb_heures_travaille = $data["nb_heures_etbsmt_utilisateur"];

        if (!empty($id_etbsmt)) {
            $id_etbsmt = $this->user->getId_etbsmt($rne_etbsmt);
            $this->user->ajout_info_etbsmt_utilisateur($id_etbsmt["id_etbsmt"], $etbsmt_laic, $nb_heures_travaille, $id_utilisateur);
        } else {
            $this->user->ajout_etbsmt($rne_etbsmt, $academie_etbsmt, $nom_etbsmt_principal, $adresse_etbsmt, $cp_etbsmt, $ville_etbsmt, $num_etbsmt, $email_etbsmt);
            // var_dump($ajout);
            $id_etbsmt = $this->user->getId_etbsmt($rne_etbsmt);

            $this->user->ajout_info_etbsmt_utilisateur($id_etbsmt["id_etbsmt"], $etbsmt_laic, $nb_heures_travaille, $id_utilisateur);
        };


        // if(isset($data["contrat"]) && !empty($data["contrat"])){
        //     $_FILES["contrat"]["name"] = $data["contrat"];
        // }

        $type_mutation = $data["type_mutation"];
        $date_demande = date("Y-m-d");
        $situation = $data["situation"];
        $type_contrat = $data["type_contrat"];
        $date_contrat = $data["date_contrat"];
        $contrat = $_FILES["contrat"]["name"];
        $statut_situation = $data["statut_situation"];
        $disponibilite = $data["disponibilite"];
        $date_debut_disponibilite = $data["date_debut_disponibilite"];
        $echelle_remuneration = $data["echelle_remuneration"];
        $remuneration_classe = $data["remuneration_classe"];
        $echelon = $data["echelon"];
        $anciennete_service = $data["anciennete_service"];

        $this->user->mutation_utilisateur(
            $type_mutation,
            $date_demande,
            $situation,
            $type_contrat,
            $date_contrat,
            $contrat,
            $statut_situation,
            $disponibilite,
            $date_debut_disponibilite,
            $echelle_remuneration,
            $remuneration_classe,
            $echelon,
            $anciennete_service,
            $id_utilisateur
        );

                if (!empty($_FILES["contrat"])) {

        // $fichier = $_FILES["contrat"]["name"];
        $fichiertmp = $_FILES["contrat"]["tmp_name"];
        $stockage_doc = "public/img/fichier-utilisateurs/";

        move_uploaded_file($fichiertmp, $stockage_doc . $contrat);
                }
        // var_dump($_FILES);
        // var_dump(move_uploaded_file($fichiertmp, $stockage_img . $contrat));



        // if (isset($_FILES["contrat"])) {

        //     $fichier = $_FILES["contrat"]["name"];
        //     $fichertmp = $_FILES["contrat"]["tmp_name"] = $data["contrat"];
        //     $stockage_img = "public/img/fichier-utilisateurs/";

        //     move_uploaded_file($fichertmp, $stockage_img . $fichier);
        // }

        if (isset($data["academie_souhaite"]) && !empty($data["academie_souhaite"])) {

            $academie_souhaite = $data["academie_souhaite"];
            // $tous_dept = $data["tous_dept"];
            $dept1 = $data["choix1"];
            $dept2 = $data["choix2"];
            $dept3 = $data["choix3"];
            $dept4 = $data["choix4"];
            $dept5 = $data["choix5"];
            $dept6 = $data["choix6"];
            $dept7 = $data["choix7"];
            $dept8 = $data["choix8"];
            $type_contrat_souhaite = $data["type_contrat_souhaite"];
            $nb_heures_souhaite = $data["nb_heures_souhaite"];
            $motif_demande = $data["motif_demande"];
            $autre_motif = $data["autre_motif"];
            $justificatif_motif = $_FILES["justificatif_motif"]["name"];

            // $mutations = $this->user->getId_mutation($id_utilisateur);
            // $mutation = end($mutations);
            $id_mutation = $this->user->getId_mutation($id_utilisateur)["id_mutation"];

            $this->user->voeux_utilisateur($academie_souhaite, $dept1, $dept2, $dept3, $dept4, $dept5, $dept6, $dept7, $dept8, $type_contrat_souhaite, $nb_heures_souhaite, $motif_demande, $autre_motif, $justificatif_motif, $id_mutation);
        }

                if (!empty($_FILES["justificatif_motif"])) {

        $fichiertmp = $_FILES["justificatif_motif"]["tmp_name"];
        move_uploaded_file($fichiertmp, $stockage_doc . $justificatif_motif);
                }

        // if (isset($_FILES["justificatif_motif"])) {

        //     $fichier = $_FILES["justificatif_motif"]["name"];
        //     $fichiertmp = $_FILES["justificatif_motif"]["tmp_name"];
        //     $stockage_img = "public/img/fichier-utilisateurs/";
        //     var_dump($_FILES);

        //     move_uploaded_file($fichiertmp, "public/img/fichier-utilisateurs/" );
        // }

        if (isset($data["academie_souhaite1"]) && !empty($data["academie_souhaite1"])) {
            $academie_souhaite1 = $data["academie_souhaite1"];
            // $tous_dept1 = $data["tous_dept1"];
            $dept1_1 = $data["choix1_1"];
            $dept2_1 = $data["choix2_1"];
            $dept3_1 = $data["choix3_1"];
            $dept4_1 = $data["choix4_1"];
            $dept5_1 = $data["choix5_1"];
            $dept6_1 = $data["choix6_1"];
            $dept7_1 = $data["choix7_1"];
            $dept8_1 = $data["choix8_1"];

            $type_contrat_souhaite1 = $data["type_contrat_souhaite1"];
            $nb_heures_souhaite1 = $data["nb_heures_souhaite1"];
            $motif_demande1 = $data["motif_demande1"];
            $autre_motif1 = $data["autre_motif1"];
            $justificatif_motif1 = $_FILES["justificatif_motif1"]["name"];

            $this->user->voeux_utilisateur($academie_souhaite1, $dept1_1, $dept2_1, $dept3_1, $dept4_1, $dept5_1, $dept6_1, $dept7_1, $dept8_1, $type_contrat_souhaite1, $nb_heures_souhaite1, $motif_demande1, $autre_motif1, $justificatif_motif1, $id_mutation);
        }

        if (!empty($_FILES["justificatif_motif1"])) {

        $fichiertmp1 = $_FILES["justificatif_motif1"]["tmp_name"];
        move_uploaded_file($fichiertmp1, $stockage_doc . $justificatif_motif1);
        }

        // if (isset($_FILES["justificatif_motif1"])) {

        //     $fichier1 = $_FILES["justificatif_motif1"]["name"];
        //     $fichertmp1 = $_FILES["justificatif_motif1"]["tmp_name"] = $data["justificatif_motif1"];
        //     $stockage_img1 = "public/img/fichier-utilisateurs/";

        //     move_uploaded_file($fichertmp1, $stockage_img1 . $fichier1);
        // }

        if (isset($data["academie_souhaite2"]) && !empty($data["academie_souhaite2"])) {
            $academie_souhaite2 = $data["academie_souhaite2"];
            $dept1_2 = $data["choix1_2"];
            $dept2_2 = $data["choix2_2"];
            $dept3_2 = $data["choix3_2"];
            $dept4_2 = $data["choix4_2"];
            $dept5_2 = $data["choix5_2"];
            $dept6_2 = $data["choix6_2"];
            $dept7_2 = $data["choix7_2"];
            $dept8_2 = $data["choix8_2"];
            $type_contrat_souhaite2 = $data["type_contrat_souhaite2"];
            $nb_heures_souhaite2 = $data["nb_heures_souhaite2"];
            $motif_demande2 = $data["motif_demande2"];
            $autre_motif2 = $data["autre_motif2"];
            $justificatif_motif2 = $_FILES["justificatif_motif2"]["name"];

            $this->user->voeux_utilisateur($academie_souhaite2, $dept1_2, $dept2_2, $dept3_2, $dept4_2, $dept5_2, $dept6_2, $dept7_2, $dept8_2, $type_contrat_souhaite2, $nb_heures_souhaite2, $motif_demande2, $autre_motif2, $justificatif_motif2, $id_mutation);
        }

        if (!empty($_FILES["justificatif_motif2"])) {

        $fichiertmp2 = $_FILES["justificatif_motif2"]["tmp_name"];
        move_uploaded_file($fichiertmp2, $stockage_doc . $justificatif_motif2);
        }

        // if (isset($_FILES["justificatif_motif2"])) {

        //     $fichier2 = $_FILES["justificatif_motif2"]["name"];
        //     $fichertmp2 = $_FILES["justificatif_motif2"]["tmp_name"] = $data["justificatif_motif2"];
        //     $stockage_img2 = "public/img/fichier-utilisateurs/";

        //     move_uploaded_file($fichertmp2, $stockage_img2 . $fichier2);
        // }

        if (isset($data["academie_souhaite3"]) && !empty($data["academie_souhaite3"])) {
            $academie_souhaite3 = $data["academie_souhaite3"];
            $dept1_3 = $data["choix1_3"];
            $dept2_3 = $data["choix2_3"];
            $dept3_3 = $data["choix3_3"];
            $dept4_3 = $data["choix4_3"];
            $dept5_3 = $data["choix5_3"];
            $dept6_3 = $data["choix6_3"];
            $dept7_3 = $data["choix7_3"];
            $dept8_3 = $data["choix8_3"];
            $type_contrat_souhaite3 = $data["type_contrat_souhaite3"];
            $nb_heures_souhaite3 = $data["nb_heures_souhaite3"];
            $motif_demande3 = $data["motif_demande3"];
            $autre_motif3 = $data["autre_motif3"];
            $justificatif_motif3 = $_FILES["justificatif_motif3"]["name"];

            $this->user->voeux_utilisateur($academie_souhaite3, $dept1_3, $dept2_3, $dept3_3, $dept4_3, $dept5_3, $dept6_3, $dept7_3, $dept8_3, $type_contrat_souhaite3, $nb_heures_souhaite3, $motif_demande3, $autre_motif3, $justificatif_motif3, $id_mutation);
        }

        if (!empty($_FILES["justificatif_motif3"])) {

        $fichiertmp3 = $_FILES["justificatif_motif3"]["tmp_name"];
        move_uploaded_file($fichiertmp3, $stockage_doc . $justificatif_motif3);
        }

        // if (isset($_FILES["justificatif_motif3"])) {

        //     $fichier3 = $_FILES["justificatif_motif3"]["name"];
        //     $fichertmp3 = $_FILES["justificatif_motif3"]["tmp_name"] = $data["justificatif_motif3"];
        //     $stockage_img3 = "public/img/fichier-utilisateurs/";

        //     move_uploaded_file($fichertmp3, $stockage_img3 . $fichier3);
        // }


        self::MessageAlerte("Votre demande de mutation a été effectué avec succès !", self::VERT);
        header("location: ".URL."compte/profile");
    }

    public function modifierSouhait($id_voeux){
        $data = SecurityController::checkData();

        $academie = $data["academie_souhaite"];
        $tousDept = $data["tous_dept"];
        $dept1 = $data["1er_dept"];
        $dept2 = $data["2eme_dept"];
        $dept3 = $data["3eme_dept"];
        $dept4 = $data["4eme_dept"];
        $dept5 = $data["5eme_dept"];
        $type_contrat = $data["type_contrat_souhaite"];
        $nb_heures = $data["nb_heures_souhaite"];
        $motif = $data["motif_demande"];
        $autre_motif = $data["autre_motif"];

        $this->user->modificationSouhait($academie, $tousDept, $dept1, $dept2, $dept3, $dept4, $dept5, $type_contrat, $nb_heures, $motif, $autre_motif, $id_voeux);
      
        self::MessageAlerte("Le voeux à été modifié avec succès !", self::VERT);
        header("location: ".URL."compte/profile");
    }

    public function supprimerSouhait($id_voeux){
        if(!empty($id_voeux)){
            $this->user->suppresssionSouhait($id_voeux);
            self::MessageAlerte("Le voeux à bien été supprimé !", self::VERT);
            header("location: ".URL."compte/profile");
        }
    }

    public function supprimerDemande($id_mutation){
        $this->user->suppresssionDemande($id_mutation);

        self::MessageAlerte("La demande à été supprimé !", self::VERT);
        header("location: ".URL."compte/profile");
    }

    public function afficherEtbsmt()
    {
        // function qui permet de remplir automatiquement les champs de l’etablissement
        $this->user->selectionEtbsmt($this->etbsmt->getRne_etbsmt());
    }

    public function afficherDepartement(){
       $this->user->getDepartement();

    //    var_dump($this->user->affichageDepartement());
    }
}
