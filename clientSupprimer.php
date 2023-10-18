<?php

include 'connexion.php';

if ( !empty($_GET['id']) ) {

    $id = $_GET['id'];

    $sql = "DELETE FROM `client` WHERE `client`.`id` = " . $id;

    if (mysqli_query($con, $sql)) {
        $_SESSION['message']['text'] = "Client a été supprimé avec succès.";
        $_SESSION['message']['type'] = "success";
        $_SESSION['message']['page'] = "client";
    } else {
        $_SESSION['message']['text'] = "Une erreur s'est produite " . mysqli_error($con);
        $_SESSION['message']['type'] = "warning";
        $_SESSION['message']['page'] = "client";
    } 
    
} 

header('Location:client.php');

?>