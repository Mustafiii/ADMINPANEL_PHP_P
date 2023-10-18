<?php

include 'connexion.php';

if ( !empty($_POST['id_article']) 
    && !empty($_POST['id_client']) 
    && !empty($_POST['quantite']) 
    && !empty($_POST['prix']) 
    && !empty($_POST['id']) ) {

    $id_article = $_POST['id_article'];
    $id_client = $_POST['id_client'];
    $quantite = $_POST['quantite'];
    $prix = $_POST['prix'];
    $id = $_POST['id'];

    $sql = "UPDATE `vente` SET `id_article` = '" . $id_article . "', `id_client` = '" . $id_client . "', `quantite` = '" . $quantite . "', `prix` = '" . $prix . "' WHERE `vente`.`id` = " . $id;

    if (mysqli_query($con, $sql)) {
        $_SESSION['message']['text'] = "Vente modifiée avec succès.";
        $_SESSION['message']['type'] = "success";
        $_SESSION['message']['page'] = "vente";
    } else {
        $_SESSION['message']['text'] = "Une erreur s'est produite " . mysqli_error($con);
        $_SESSION['message']['type'] = "warning";
        $_SESSION['message']['page'] = "vente";
    } 
    
} else {
    $_SESSION['message']['text'] = "Un ou plusieurs champs sont vides.";
    $_SESSION['message']['type'] = "danger";
    $_SESSION['message']['page'] = "vente";
    }

header('Location:vente.php');
?>