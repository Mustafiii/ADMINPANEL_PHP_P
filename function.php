<?php 
include 'connexion.php';

function getarticle($id = null) {
    if (!empty($id)) {
        $req = "SELECT * FROM `article` WHERE `id` = $id";
        $result = mysqli_query($GLOBALS['con'], $req);
        return $result;
    } else {
        $req = "SELECT * FROM `article`";
        $result = mysqli_query($GLOBALS['con'], $req);
        // return mysqli_fetch_assoc($result);
        return $result;
    }
    
}

function deleteArticle($id)
{
    if (!is_null($id)) {
        $req = "DELETE FROM `article` WHERE `id` = $id";
        mysqli_query($GLOBALS['con'], $req);
    }
}

function getclient($id=null) {
    if (!empty($id)) {
        $req = "SELECT * FROM `client` WHERE `id` = $id";
        $result = mysqli_query($GLOBALS['con'], $req);
        return $result;
    } else {
        $req="SELECT * FROM `client`";
        $result = mysqli_query($GLOBALS['con'], $req);
        return $result;
    }
}

function getvente($id=null) {
    if ( !empty($id) ) {
        $req = "SELECT `v`.`id`, `a`.`nom_article`, CONCAT(`c`.`nom`, ' ', `c`.`prenom`) AS nom_client, `v`.`quantite`, `v`.`prix`, `v`.`date_vente`, `c`.`telephone`, `c`.`adresse`, `a`.`prix_unitaire`
            FROM `client` AS `c`, `vente` AS `v`, `article` AS `a` 
            WHERE `v`.`id_article` = `a`.`id` AND `v`.`id_client` = `c`.`id` AND `v`.`id` = $id AND `etat` = '1'";
        // $req = "Select v.id ,nom_article,nom,prenom,v.quantite,prix,date_vente,prix_unitaire,adresse,telephone from client as c, vente as v, article as a where v.id_article=a.id and v.id_client=c.id and v.id=$id and etat='1'";
        $result = mysqli_query($GLOBALS['con'], $req);
        return $result;
    } else {
        $req = "SELECT `v`.`id`, `a`.`nom_article`, CONCAT(`c`.`nom`, ' ', `c`.`prenom`) AS nom_client, `v`.`quantite`, `v`.`prix`, `v`.`date_vente`, `a`.`id` AS `id_article` 
            FROM `client` AS `c`, `vente` AS `v`, `article` AS `a` 
            WHERE `v`.`id_article` = `a`.`id` AND `v`.`id_client` = `c`.`id` AND `etat` = '1' ORDER BY `v`.`id` DESC";
        // $req = "Select v.id ,nom_article, nom, prenom ,v.quantite ,prix ,date_vente,a.id as id_article from client as c, vente as v, article as a where v.id_article=a.id and v.id_client=c.id and etat='1'";
        $result = mysqli_query($GLOBALS['con'], $req);
        return $result;
    }
}

function getfournisseur($id=null) {
    if (!empty($id)) {
        $req = "SELECT * FROM `fournisseur` WHERE `id` = $id";
        $result = mysqli_query($GLOBALS['con'], $req);
        return $result;
    } else {
        $req="SELECT * FROM `fournisseur`";
        $result = mysqli_query($GLOBALS['con'], $req);
        return $result;
    }
}

function getcommande($id=null) {
    if ( !empty($id) ) {
        $req = "SELECT `co`.`id`, `a`.`nom_article`, CONCAT(`f`.`nom`, ' ', `f`.`prenom`) AS nom_fournisseur, `co`.`quantite`, `co`.`prix`, `co`.`date_commande`, `f`.`telephone`, `f`.`adresse`, `a`.`prix_unitaire`
            FROM `fournisseur` AS `f`, `commande` AS `co`, `article` AS `a` 
            WHERE `co`.`id_article` = `a`.`id` AND `co`.`id_fournisseur` = `f`.`id` AND `co`.`id` = $id AND `etat` = '1'";
        // $req = "Select v.id ,nom_article,nom,prenom,v.quantite,prix,date_vente,prix_unitaire,adresse,telephone from client as c, vente as v, article as a where v.id_article=a.id and v.id_client=c.id and v.id=$id and etat='1'";
        $result = mysqli_query($GLOBALS['con'], $req);
        return $result;
    } else {
        $req = "SELECT `co`.`id`, `a`.`nom_article`, CONCAT(`f`.`nom`, ' ', `f`.`prenom`) AS nom_fournisseur, `co`.`quantite`, `co`.`prix`, `co`.`date_commande`, `a`.`id` AS `id_article` 
            FROM `fournisseur` AS `f`, `commande` AS `co`, `article` AS `a` 
            WHERE `co`.`id_article` = `a`.`id` AND `co`.`id_fournisseur` = `f`.`id` AND `etat` = '1' ORDER BY `co`.`id` DESC";
        // $req = "Select v.id ,nom_article, nom, prenom ,v.quantite ,prix ,date_vente,a.id as id_article from client as c, vente as v, article as a where v.id_article=a.id and v.id_client=c.id and etat='1'";
        $result = mysqli_query($GLOBALS['con'], $req);
        return $result;
    }
}