<?php

class Formulaire{
    private $id_mutation;
    private $id_utilisateur;
    private $type_mutation;
    private $date_demande;
    private $situation;
    private $type_contrat;
    private $date_contrat;
    private $contrat;
    private $statut_situation;
    private $disponibilite;
    private $date_debut_disponibilite;
    private $echelle_remuneration;
    private $remuneration_classe;
    private $echelon;
    private $anciennete_service;
    private $nb_heures_etbsmt_utilisateur;
    private $statut_demande;
    private $id_voeux;
    private $academie_souhaite;
    private $tous_dept;
    private $dept_souhaite1;
    private $dept_souhaite2;
    private $dept_souhaite3;
    private $dept_souhaite4;
    private $dept_souhaite5;
    private $type_contrat_souhaite;
    private $nb_heures_souhaite;
    private $motif_demande;
    private $autre_motif;

    public function getId_mutation(){
        return $this->id_mutation;
    }
    public function setId_mutation($id_mutation){
        $this->id_mutation = $id_mutation;
    }

    public function getId_utilisateur(){
        return $this->id_utilisateur;
    }
    public function setId_utilisateur($id_utilisateur){
        $this->id_utilisateur = $id_utilisateur;
    }

    public function getType_mutation(){
        return $this->type_mutation;
    }
    public function setType_mutation($type_mutation){
        $this->type_mutation = $type_mutation;
    }

    public function getDate_demande(){
        return $this->date_demande;
    }
    public function setDate_demande($date_demande){
        $this->date_demande = $date_demande;
    }

    public function getSituation(){
        return $this->situation;
    }
    public function setSituation($situation){
        $this->situation = $situation;
    }

    public function getType_contrat(){
        return $this->type_contrat;
    }
    public function setType_contrat($type_contrat){
        $this->type_contrat = $type_contrat;
    }

    public function getDate_contrat(){
        return $this->date_contrat;
    }
    public function setDate_contrat($date_contrat){
        $this->date_contrat = $date_contrat;
    }

    public function getContrat(){
        return $this->contrat;
    }
    public function setContrat($contrat){
        $this->contrat = $contrat;
    }

    public function getStatut_situation(){
        return $this->statut_situation;
    }
    public function setStatut_situation($statut_situation){
        $this->statut_situation = $statut_situation;
    }

    public function getDisponibilite(){
        return $this->disponibilite;
    }
    public function setDisponibilite($disponibilite){
        $this->disponibilite = $disponibilite;
    }

    public function getDate_debut_disponibilite(){
        return $this->date_debut_disponibilite;
    }
    public function setDate_debut_disponibilite($date_debut_disponibilite){
        $this->date_debut_disponibilite = $date_debut_disponibilite;
    }

    public function getEchelle_remuneration(){
        return $this->echelle_remuneration;
    }
    public function setEchelle_remuneration($echelle_remuneration){
        $this->echelle_remuneration = $echelle_remuneration;
    }

    public function getRemuneration_classe(){
        return $this->remuneration_classe;
    }
    public function setRemuneration_classe($remuneration_classe){
        $this->remuneration_classe = $remuneration_classe;
    }

    public function getEchelon(){
        return $this->echelon;
    }
    public function setEchelon($echelon){
        $this->echelon = $echelon;
    }

    public function getAnciennete_service(){
        return $this->anciennete_service;
    }
    public function setAnciennete_service($anciennete_service){
        $this->anciennete_service = $anciennete_service;
    }

    public function getNb_heures_etbsmt_utilisateur(){
        return $this->nb_heures_etbsmt_utilisateur;
    }
    public function setNb_heures_etbsmt_utilisateur($nb_heures_etbsmt_utilisateur){
        $this->nb_heures_etbsmt_utilisateur = $nb_heures_etbsmt_utilisateur;
    }

    public function getStatut_demande(){
        return $this->statut_demande;
    }
    public function setStatut_demande($statut_demande){
        $this->statut_demande = $statut_demande;
    }

    public function getId_voeux(){
        return $this->id_voeux;
    }
    public function setId_voeux($id_voeux){
        $this->id_voeux = $id_voeux;
    }

    public function getAcademie_souhaite(){
        return $this->academie_souhaite;
    }
    public function setAcademie_souhaite($academie_souhaite){
        $this->academie_souhaite = $academie_souhaite;
    }

    public function getTous_dept(){
        return $this->tous_dept;
    }
    public function setTous_dept($tous_dept){
        $this->tous_dept = $tous_dept;
    }

    public function getDept_souhaite1(){
        return $this->dept_souhaite1;
    }
    public function setDept_souhaite1($dept_souhaite1){
        $this->dept_souhaite1 = $dept_souhaite1;
    }

    public function getDept_souhaite2(){
        return $this->dept_souhaite2;
    }
    public function setDept_souhaite2($dept_souhaite2){
        $this->dept_souhaite2 = $dept_souhaite2;
    }

    public function getDept_souhaite3(){
        return $this->dept_souhaite3;
    }
    public function setDept_souhaite3($dept_souhaite3){
        $this->dept_souhaite3 = $dept_souhaite3;
    }

    public function getDept_souhaite4(){
        return $this->dept_souhaite4;
    }
    public function setDept_souhaite4($dept_souhaite4){
        $this->dept_souhaite4 = $dept_souhaite4;
    }

    public function getDept_souhaite5(){
        return $this->dept_souhaite5;
    }
    public function setDept_souhaite5($dept_souhaite5){
        $this->dept_souhaite5 = $dept_souhaite5;
    }

    public function getType_contrat_souhaite(){
        return $this->type_contrat_souhaite;
    }
    public function setType_contrat_souhaite($type_contrat_souhaite){
        $this->type_contrat_souhaite = $type_contrat_souhaite;
    }

    public function getNb_heures_souhaite(){
        return $this->nb_heures_souhaite;
    }
    public function setNb_heures_souhaite($nb_heures_souhaite){
        $this->nb_heures_souhaite = $nb_heures_souhaite;
    }

    public function getMotif_demande(){
        return $this->motif_demande;
    }
    public function setMotif_demande($motif_demande){
        $this->motif_demande = $motif_demande;
    }

    public function getAutre_motif(){
        return $this->autre_motif;
    }
    public function setAutre_motif($autre_motif){
        $this->autre_motif = $autre_motif;
    }
}
