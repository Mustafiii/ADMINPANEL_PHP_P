<?php

include 'connexion.php';

if ( !empty($_GET['idv']) && !empty($_GET['ida']) && !empty($_GET['q']) ) {

    $id_vente = $_GET['idv'];
    $id_article = $_GET['ida'];
    $quantite = $_GET['q'];

    $sql = "UPDATE `vente` SET `etat` = '0' WHERE `vente`.`id` = " . $id_vente;
    
    if (mysqli_query($con, $sql)) {
        $sql = "UPDATE `article` SET `article`.`quantite` = `article`.`quantite` + $quantite WHERE `article`.`id` = $id_article";
        if (mysqli_query($con, $sql)) {
            $_SESSION['message']['text'] = "Vente a été annulée avec succès.";
            $_SESSION['message']['type'] = "success";
            $_SESSION['message']['page'] = "vente";
        }
    } else {
        $_SESSION['message']['text'] = "Une erreur s'est produite " . mysqli_error($con);
        $_SESSION['message']['type'] = "warning";
        $_SESSION['message']['page'] = "vente";
    } 
    
} 

header('Location:vente.php');

?>