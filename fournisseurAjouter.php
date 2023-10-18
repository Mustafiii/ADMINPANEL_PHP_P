<?php

include 'connexion.php';

if ( !empty($_POST['nom']) 
    && !empty($_POST['prenom']) 
    && !empty($_POST['telephone']) 
    && !empty($_POST['adresse']) ) {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];

    $sql = "INSERT INTO `fournisseur` (`nom`, `prenom`, `telephone`, `adresse`) VALUES ('$nom', '$prenom', '$telephone', '$adresse')";

    if (mysqli_query($con, $sql)) {
        $_SESSION['message']['text'] = "Fournisseur ajouté avec succès.";
        $_SESSION['message']['type'] = "success";
        $_SESSION['message']['page'] = "fournisseur";
    } else {
        $_SESSION['message']['text'] = "Une erreur s'est produite " . mysqli_error($con);
        $_SESSION['message']['type'] = "warning";
        $_SESSION['message']['page'] = "fournisseur";
    } 
    
} else {
    $_SESSION['message']['text'] = "Un ou plusieurs champs sont vides.";
    $_SESSION['message']['type'] = "danger";
    $_SESSION['message']['page'] = "fournisseur";
}

header('Location:fournisseur.php');

?>