<?php
    include 'function.php';
    $localdate = getdate(); 

    $pathArr = explode("/", $_SERVER['PHP_SELF']);
    $file = end($pathArr);
    $fileArr = explode(".", $file);
    $filename = $fileArr[0];
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css">
</head>
<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class="bx bx-store-alt"></i>
            <span class="logo_name">E-market</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="dashboard.php"<?php if ($filename == "dashboard") { echo " class=\"active\""; }  ?>>
                    <i class="bx bx-grid-alt"></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="article.php"<?php if ($filename == "article") { echo " class=\"active\""; }  ?>>
                    <i class="bx bx-box"></i>
                    <span class="links_name">Articles</span>
                </a>
            </li>
            <li>
                <a href="client.php"<?php if ($filename == "client") { echo " class=\"active\""; }  ?>>
                    <i class="bx bx-list-ul"></i>
                    <span class="links_name">Clients</span>
                </a>
            </li>
            <li>
                <a href="vente.php"<?php if ($filename == "vente") { echo " class=\"active\""; }  ?>>
                    <i class="bx bx-pie-chart-alt-2"></i>
                    <span class="links_name">Ventes</span>
                </a>
            </li>
            <li>
                <a href="fournisseur.php"<?php if ($filename == "fournisseur") { echo " class=\"active\""; }  ?>>
                    <i class="bx bx-coin-stack"></i>
                    <span class="links_name">Fournisseurs</span>
                </a>
            </li>
            <li>
                <a href="commande.php"<?php if ($filename == "commande") { echo " class=\"active\""; }  ?>>
                    <i class="bx bx-book-alt"></i>
                    <span class="links_name">Commandes</span>
                </a>
            </li>
            <li>
                <a href="#"<?php if ($filename == "utilisateur") { echo " class=\"active\""; }  ?>>
                    <i class="bx bx-user"></i>
                    <span class="links_name">Utilisateur</span>
                </a>
            </li>
            <li>
                <a href="#"<?php if ($filename == "configuration") { echo " class=\"active\""; }?>>
                    <i class="bx bx-cog"></i>
                    <span class="links_name">Configuration</span>
                </a>
            </li>
            <li class="log_out">
                <a href="#">
                    <i class="bx bx-log-out"></i>
                    <span class="links_name">Déconnexion</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class="bx bx-menu sidebarBtn"></i>
                <span class="dashboard">Dashboard</span>
            </div>
            <div class="search-box">
                <input type="text" placeholder="Recherche...">
                <i class="bx bx-search"></i>
            </div>
            <div class="profile-details">
                <img src="images/profil.jpg" alt="">
                <span class="admin_name">Ziyad</span>
                <i class="bx bx-chevron-down"></i>
            </div>
        </nav>
