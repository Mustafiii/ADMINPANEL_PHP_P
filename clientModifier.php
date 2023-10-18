<?php

include 'connexion.php';

if ( !empty($_POST['nom']) 
    && !empty($_POST['prenom']) 
    && !empty($_POST['telephone']) 
    && !empty($_POST['adresse']) 
    && !empty($_POST['id']) ) {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    $id = $_POST['id'];

    $sql = "UPDATE `client` SET `nom` = '" . $nom . "', `prenom` = '" . $prenom . "', `telephone` = '" . $telephone . "', `adresse` = '" . $adresse . "' WHERE `client`.`id` = " . $id;

    if (mysqli_query($con, $sql)) {
        $_SESSION['message']['text'] = "Client modifié avec succès.";
        $_SESSION['message']['type'] = "success";
        $_SESSION['message']['page'] = "client";
    } else {
        $_SESSION['message']['text'] = "Une erreur s'est produite " . mysqli_error($con);
        $_SESSION['message']['type'] = "warning";
        $_SESSION['message']['page'] = "client";
    } 
    
} else {
    $_SESSION['message']['text'] = "Un ou plusieurs champs sont vides.";
    $_SESSION['message']['type'] = "danger";
    $_SESSION['message']['page'] = "client";
}

header('Location:client.php');
?>