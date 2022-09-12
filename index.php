<?php
session_start();

?>

<?php
// Defintion d'une constante URL Constante qui redefini un lien absolu depuis http ou https
// str_replace sert juste à supprimer
// index.php de la redefintion de URL.

define("URL", str_replace("index.php", "", (isset($_SERVER["HTTPS"]) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));


// index.php est le routeur de l'application 
//Inclusion des fichiers CONTROLLER
require_once "controllers/visitor/visitorController.php";
// require_once "Controllers/ArticleController.php";
require_once "controllers/user/userController.php";
require_once "Controllers/securityController.php";

//Instanciation des class CONTROLLER
// $article= new ArticleController();
$visitor = new VisitorController();
$user = new UserController();
$security = new SecurityController();

// Si $_GET["page"] est vide
try {
    if (empty($_GET['page'])) {
        $visitor->home();
    } else {
        $url = explode('/', filter_var($_GET["page"], FILTER_SANITIZE_URL));

        switch ($url[0]) {
            case "accueil":
                $visitor->home();
                break;
            case "inscription":
                $visitor->inscription();
                break;
            case "validation":
                $user->validation();
                break;
            case "compte":
                if ($security->isLog()) {
                    switch ($url[1]) {
                        case "profile":
                            $user->profile();
                            break;
                        case "deconnexion":
                            $user->deconnexion();
                            break;
                        case "demandeMutation":
                            $user->formulaireMutation();
                            break;
                        case "afficherEtbsmt";
                            $user->afficherEtbsmt();
                            break;
                        case "afficherDepartement";
                            $user->afficherDepartement();
                            break;
                        case "mutation":
                            $user->demandeMutation($url[2]);
                            break;
                        case "modifierSouhait":
                            $user->modifierSouhait($url[2]);
                            break;
                        case "supprimerSouhait":
                            $user->supprimerSouhait($url[2]);
                            break;
                        case "supprimerDemande":
                            $user->supprimerDemande($url[2]);
                            break;
                        default:
                            throw new Exception("La page n'existe pas formulaire!");
                    }
                } else {
                    AbstractController::MessageAlerte("Vous devez vous connecter !", AbstractController::ROUGE);
                    header("location: " . URL . "accueil");
                }
                break;

                // case 'article':     
                //     if(empty($url[1])){
                //     $article->afficher_articles();
                // }elseif ($url[1]==='add'){

                //         $article->formAdd();

                // }elseif($url[1]==='validation'){
                //     $article->addValidation();
                // }elseif($url[1]==='delete'){
                //     $article->deleteArticle($url[2]);

                // }elseif($url[1]==='update'){
                //     $article->updateFormArticle($url[2]);
                // }elseif($url[1]==='updateValidation'){
                //     $article->updateValidation($url[2]);
                // }
                // else{
                //     throw new Exception("la page n'existe pas ");
                // }
                // break;
            default:
                throw new Exception("Aucune page trouvé");
        }
    }
} catch (Exception $e) {
    $msg = $e->getMessage();
    header("/views/error.view.php");
    require "views/error.view.php";
}
