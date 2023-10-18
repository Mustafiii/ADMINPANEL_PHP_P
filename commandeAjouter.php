<?php

include 'connexion.php';

if ( !empty($_POST['id_article']) 
    && !empty($_POST['id_fournisseur']) 
    && !empty($_POST['quantite']) 
    && !empty($_POST['prix']) ) {

    if ($_POST['quantite'] != 0) {
        $id_article = $_POST['id_article'];
        $id_fournisseur = $_POST['id_fournisseur'];
        $quantite = $_POST['quantite'];
        $prix = $_POST['prix'];

        $sql = "INSERT INTO `commande` (`id_article`, `id_fournisseur`, `quantite`, `prix`) VALUES ('$id_article', '$id_fournisseur', $quantite, $prix)";
        
        if (mysqli_query($con, $sql)) {

            $sql = "UPDATE `article` SET `article`.`quantite` = `article`.`quantite` + $quantite WHERE `article`.`id` = $id_article";
            if (mysqli_query($con, $sql)) {
                $_SESSION['message']['text'] = "Commande ajoutée avec succès.";
                $_SESSION['message']['type'] = "success";
                $_SESSION['message']['page'] = "commande";
            }
            
        } else {
            $_SESSION['message']['text'] = "Une erreur s'est produite " . mysqli_error($con);
            $_SESSION['message']['type'] = "warning";
            $_SESSION['message']['page'] = "commande";
        }
    }
    
} else {
    $_SESSION['message']['text'] = "Un ou plusieurs champs sont vides.";
    $_SESSION['message']['type'] = "danger";
    $_SESSION['message']['page'] = "commande";
}

header('Location:commande.php');

?>