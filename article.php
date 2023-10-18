<?php 
include 'entete.php';

session_start();
session_destroy();
session_start();

if (!empty($_GET['id'])) {
    $articleUpdate = getarticle($_GET['id']);
    foreach ($articleUpdate as $key => $value) {
        $na = $value['nom_article'];
        $ca = $value['categorie'];
        $qu = $value['quantite'];
        $pu = $value['prix_unitaire'];
        $df = $value['date_fabrication'];
        $de = $value['date_expiration'];
        $id = $value['id'];
    }
}

?>

<div class="home-content">
    <div class="overview-boxes">
        <div class="box">
            <form action="<?= !empty($_GET['id']) ? "articleModifier.php" : "articleAjouter.php" ?>" method="post">

                <input type="hidden" name="id" id="id" value="<?= $id ?>">

                <label for="nom_article">Nom de l'article</label>
                <input type="text" name="nom_article" id="nom_article" value="<?= !empty($_GET['id']) ? $na : "" ?>">
                
                <label for="categorie">Catégorie</label>
                <select name="categorie" id="categorie">
                    <option value="Ordinateur" <?= !empty($_GET['id']) && $ca == "Ordinateur" ? "selected" : "" ?>>Ordinateur</option>
                    <option value="Imprimante" <?= !empty($_GET['id']) && $ca == "Imprimante" ? "selected" : "" ?>>Imprimante</option>
                    <option value="Accessoire" <?= !empty($_GET['id']) && $ca == "Accessoire" ? "selected" : "" ?>>Accessoire</option>
                </select>
                
                <label for="quantite">Quantité</label>
                <input type="number" name="quantite" id="quantite" value="<?= !empty($_GET['id']) ? $qu : "" ?>">
                
                <label for="prix_unitaire">Prix unitaire</label>
                <input type="number" name="prix_unitaire" id="prix_unitaire" step="0.01" value="<?= !empty($_GET['id']) ? $pu : "" ?>">
                
                <label for="date_fabrication">Date de fabrication</label>
                <input type="date" name="date_fabrication" id="date_fabrication" value="<?= !empty($_GET['id']) ? $df : ""; ?>">
                <!-- 
                datetime-local
                $localdate['year'] . "-" . $localdate['mon'] . "-" . $localdate['mday']
                pattern="\d{4}-\d{2}-\d{2}" 
                -->
                <label for="date_expiration">Date d'expiration</label>
                <input type="date" name="date_expiration" id="date_expiration" value="<?= !empty($_GET['id']) ? $de : ""; ?>">
                <!-- 
                datetime-local
                $localdate['year'] . "-" . $localdate['mon'] . "-" . $localdate['mday']
                pattern="\d{4}-\d{2}-\d{2}" 
                -->
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
                    <th>Nom Article</th>
                    <th>Catégorie</th>
                    <th>Quantité</th>
                    <th>Prix Unitaire</th>
                    <th>Date Fabrication</th>
                    <th>Date Expiration</th>
                    <th>Action</th>
                </tr>

            <?php
                $article = getarticle(null);
                if (!empty($article)) {
                    foreach ($article as $key => $value) {
                        $df = date_create($value['date_fabrication']);
                        $de = date_create($value['date_expiration']);
                ?>

                    <tr>
                        <td><?= $value['nom_article'] ?></td>
                        <td><?= $value['categorie'] ?></td>
                        <td><?= $value['quantite'] ?></td>
                        <td><?= $value['prix_unitaire'] ?></td>
                        <td><?= date_format($df, "Y-m-d") ?></td>
                        <td><?= date_format($de, "Y-m-d") ?></td>
                        <td>
                            <a href="?id=<?= $value['id'] ?>"><i class="bx bx-edit-alt"></i></a>
                            <a onclick="articleSupprimer(<?= $value['id'] ?>)"><i class="bx bx-trash"></i></a>
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
<script>
    function articleSupprimer(id) {
        if (confirm("Voulez-vous vraiment supprimer cet article ?")) {
            window.location.href = "articleSupprimer.php?id=" + id;
        }
    }
</script>

<?php
include 'pied.php';
?>