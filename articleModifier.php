<?php

include 'connexion.php';

if ( !empty($_POST['nom_article']) 
    && !empty($_POST['categorie']) 
    && !empty($_POST['quantite']) 
    && !empty($_POST['prix_unitaire']) 
    && !empty($_POST['date_fabrication']) 
    && !empty($_POST['date_expiration']) 
    && !empty($_POST['id']) ) {

    $nom_article = $_POST['nom_article'];
    $categorie = $_POST['categorie'];
    $quantite = $_POST['quantite'];
    $prix_unitaire = $_POST['prix_unitaire'];
    $date_fabrication = $_POST['date_fabrication'];
    $date_expiration = $_POST['date_expiration'];
    $id = $_POST['id'];

    // $sql = "INSERT INTO `article` (`nom_article`, `categorie`, `quantite`, `prix_unitaire`, `date_expiration`, `date_fabrication`) VALUES ('$nom_article', '$categorie', $quantite, $prix_unitaire, '$date_expiration', '$date_fabrication')";
    $sql = "UPDATE `article` SET `nom_article` = '" . $nom_article . "', `categorie` = '" . $categorie . "', `quantite` = '" . $quantite . "', `prix_unitaire` = '" . $prix_unitaire . "', `date_expiration` = '" . $date_expiration . "', `date_fabrication` = '" . $date_fabrication . "' WHERE `article`.`id` = " . $id;

    if (mysqli_query($con, $sql)) {
        $_SESSION['message']['text'] = "Article a été modifié avec succès.";
        $_SESSION['message']['type'] = "success";
        $_SESSION['message']['page'] = "article";
    } else {
        $_SESSION['message']['text'] = "Une erreur s'est produite " . mysqli_error($con);
        $_SESSION['message']['type'] = "warning";
        $_SESSION['message']['page'] = "article";
    } 
    
} else {
    $_SESSION['message']['text'] = "Un ou plusieurs champs sont vides.";
    $_SESSION['message']['type'] = "danger";
    $_SESSION['message']['page'] = "article";
    }

header('Location:article.php');
?>