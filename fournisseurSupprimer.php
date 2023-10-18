<?php

include 'connexion.php';

if ( !empty($_GET['id']) ) {

    $id = $_GET['id'];

    $sql = "DELETE FROM `fournisseur` WHERE `fournisseur`.`id` = " . $id;

    if (mysqli_query($con, $sql)) {
        $_SESSION['message']['text'] = "Fournisseur a été supprimé avec succès.";
        $_SESSION['message']['type'] = "success";
        $_SESSION['message']['page'] = "fournisseur";
    } else {
        $_SESSION['message']['text'] = "Une erreur s'est produite " . mysqli_error($con);
        $_SESSION['message']['type'] = "warning";
        $_SESSION['message']['page'] = "fournisseur";
    } 
    
} 

header('Location:fournisseur.php');

?>