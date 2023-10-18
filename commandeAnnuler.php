<?php

include 'connexion.php';

if ( !empty($_GET['idc']) && !empty($_GET['ida']) && !empty($_GET['q']) ) {

    $id_commande = $_GET['idc'];
    $id_article = $_GET['ida'];
    $quantite = $_GET['q'];

    $sql = "UPDATE `commande` SET `etat` = '0' WHERE `commande`.`id` = " . $id_commande;
    
    if (mysqli_query($con, $sql)) {

        $sql = "UPDATE `article` SET `article`.`quantite` = `article`.`quantite` - $quantite WHERE `article`.`id` = $id_article";
        if (mysqli_query($con, $sql)) {
            $_SESSION['message']['text'] = "Commande a été annulée avec succès.";
            $_SESSION['message']['type'] = "success";
            $_SESSION['message']['page'] = "commande";
        }
        
    } else {
        $_SESSION['message']['text'] = "Une erreur s'est produite " . mysqli_error($con);
        $_SESSION['message']['type'] = "warning";
        $_SESSION['message']['page'] = "commande";
    } 
    
} 

header('Location:commande.php');

?>