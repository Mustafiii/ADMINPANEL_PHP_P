<?php

include 'connexion.php';
include 'function.php';

if ( !empty($_POST['id_article']) 
    && !empty($_POST['id_client']) 
    && !empty($_POST['quantite']) 
    && !empty($_POST['prix']) ) {

    $id_article = $_POST['id_article'];
    $id_client = $_POST['id_client'];
    $quantite = $_POST['quantite'];
    $prix = $_POST['prix'];

    $article = getarticle($id_article);
    foreach ($article as $key => $value) {
        $quantiteDB = $value['quantite'];
    }

    if (!empty($article) && !empty($quantiteDB)) {
        if ($quantite < $quantiteDB) {
            if ($_POST['quantite'] != 0) {
                
                $sql = "INSERT INTO `vente` (`id_article`, `id_client`, `quantite`, `prix`) VALUES ('$id_article', '$id_client', $quantite, $prix)";
                
                if (mysqli_query($con, $sql)) {
                    $sql = "UPDATE `article` SET `article`.`quantite` = `article`.`quantite` - $quantite WHERE `article`.`id` = $id_article";
                    if (mysqli_query($con, $sql)) {
                        $_SESSION['message']['text'] = "Vente ajoutée avec succès.";
                        $_SESSION['message']['type'] = "success";
                        $_SESSION['message']['page'] = "vente";
                    }
                } else {
                    $_SESSION['message']['text'] = "Une erreur s'est produite " . mysqli_error($con);
                    $_SESSION['message']['type'] = "warning";
                    $_SESSION['message']['page'] = "vente";
                } 
            }
        } else {
            $_SESSION['message']['text'] = "La quantité demandé n'est pas disponible.";
            $_SESSION['message']['type'] = "warning";
            $_SESSION['message']['page'] = "vente";
        }
    }
} else {
    $_SESSION['message']['text'] = "Un ou plusieurs champs sont vides.";
    $_SESSION['message']['type'] = "danger";
    $_SESSION['message']['page'] = "vente";
}

header('Location:vente.php');

?>