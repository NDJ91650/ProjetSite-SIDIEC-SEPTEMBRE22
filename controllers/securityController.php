<?php 

class SecurityController{

    public static function checkData(){
        foreach ($_POST as $key => $value) {
            $valid = (isset($value) && !empty($value)) ? htmlspecialchars($value) : null;
            $valid = (isset($value) && !empty($value)) ? trim($valid) : null;
            $valid = (isset($value) && !empty($value)) ? stripslashes($valid) : null;
            // if ($value == null) {
            //     throw  new Exception("Données erreur");
            // }
            $tab[$key] = $valid;
        }
        return $tab;
    }

    public static function isLog(){
        if(empty($_SESSION["utilisateur"])){
            return false;
        }else{
            return true;
        }
    }
}