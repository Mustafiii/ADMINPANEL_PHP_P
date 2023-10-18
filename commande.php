<?php 
include 'entete.php';

if (!empty($_GET['id'])) {
    $commandes = getcommande($_GET['id']);
    foreach ($commandes as $key => $value) {
        $id = $value['id'];
    }
}

?>

<div class="home-content">
    <div class="overview-boxes">
        <div class="box">
            <form action="commandeAjouter.php" method="post">

                <input type="hidden" name="id" id="id" value="</?= $_GET['id'] ?>">

                <label for="id_article">Article</label>
                <select name="id_article" id="id_article" onchange="setprix()">
                    <?php
                    $articles = getarticle();
                    if (!empty($articles)) {
                        ?>
                        <script>
                            var articlesQty = {};
                        </script>
                        <?php
                        foreach ($articles as $key => $value) {
                            ?>
                            <option value="<?= $value['id'] ?>" data-prix="<?= $value['prix_unitaire'] ?>" data-qte="<?= $value['quantite'] ?>"><?= $value['nom_article'] ?></option>
                            <script>
                                Object.assign( articlesQty, {<?= $value['id'] ?>: <?= $value['quantite'] ?>} );
                            </script>
                            <?php
                        }
                    }
                    ?>
                </select>
                <label for="" style="display: inline;">Quantité disponible</label>
                <p id="articleQuantite" style="display: block; direction: rtl; margin-block-start: -25px;">
                    <?php 
                        foreach ($articles as $key => $value) {
                            if ($key == 0) echo $value['quantite'];
                        }
                    ?>
                </p>
                <br>
                
                <label for="id_fournisseur">Fournisseur</label>
                <select name="id_fournisseur" id="id_fournisseur">
                    <?php
                    $fournisseur = getfournisseur(null);
                    if (!empty($fournisseur)) {
                        foreach ($fournisseur as $key => $value) {
                            ?>
                            <option value="<?= $value['id'] ?>"> <?= $value['nom'] . " " . $value['prenom'] ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
                
                <label for="quantite">Quantité</label>
                <input type="number" name="quantite" id="quantite" min="0" onchange="setprix()" onkeyup="setprix()" value="<?= !empty($_GET['id']) ? $qu : "" ?>">
                
                <label for="prix">Prix</label>
                <!-- <textarea type="text" name="adresse" id="adresse" rows="3" cols="10" value="<\?= !empty($_GET['id']) ? $adresse : "" ?>"></textarea> -->
                <input type="number" name="prix" id="prix" step="0.01" readonly value="<?= !empty($_GET['id']) ? $pu : "" ?>">
                
                <button type="submit" name="valider"><?= !empty($_GET['id']) ? "Enregistrer les modifications" : "Ajouter" ?></button>

                <?php if (!empty($_SESSION['message']['text']) && $_SESSION['message']['page'] == $filename) { ?>
                    <div class="alert <?= $_SESSION['message']['type'] ?>">
                        <?= $_SESSION['message']['text'] ?>
                    </div>
                <?php } ?>
                
            </form>
        </div>

        <div class="box">
            <table class="mtable">
                <tr>
                    <th>Article</th>
                    <th>Fournisseur</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                    <th>Date commande</th>
                    <th>Action</th>
                </tr>

            <?php
                $commandes = getcommande(null);
                if (!empty($commandes)) {
                    foreach ($commandes as $key => $value) {
                        $dc = date_create($value['date_commande']);
                ?>

                    <tr>
                        <td><?= $value['nom_article'] ?></td>
                        <td><?= $value['nom_fournisseur'] ?></td>
                        <td><?= $value['quantite'] ?></td>
                        <td><?= $value['prix'] ?></td>
                        <td><?= date_format($dc, "Y-m-d") ?></td>
                        <td>
                            <a href="commandeRecu.php?id=<?= $value['id'] ?>"><i class="bx bxs-receipt"></i></a>
                            <?php // <a onclick="annuler_vente(<?= $value['id_article'] ?/>, <?= $value['id'] ?/>, <?= $value['quantite'] ?/>)" style="color:red;"><i class='bx bxs-message-square-minus'></i></a> ?>
                            <a onclick="commandeAnnuler(<?= $value['id'] ?>, <?= $value['id_article'] ?>, <?= $value['quantite'] ?>)" style="color:red;"><i class='bx bxs-message-square-minus'></i></a>
                        </td>
                    </tr>

                <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td><p>No records found.</p></td>
                    </tr>
                    <?php
                }
            ?>

            </table>
        </div>
    </div>
</div>

<?php
include 'pied.php';
?>