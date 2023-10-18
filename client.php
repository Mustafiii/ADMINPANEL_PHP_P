<?php 
include 'entete.php';

if (!empty($_GET['id'])) {
    $client = getclient($_GET['id']);
    foreach ($client as $key => $value) {
        $nom = $value['nom'];
        $prenom = $value['prenom'];
        $tel = $value['telephone'];
        $adresse = $value['adresse'];
        $id = $value['id'];
    }
}

?>

<div class="home-content">
    <div class="overview-boxes">
        <div class="box">
            <form action="<?= !empty($_GET['id']) ? "clientModifier.php" : "clientAjouter.php" ?>" method="post">

                <input type="hidden" name="id" id="id" value="<?= $_GET['id'] ?>">

                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom"  value="<?= !empty($_GET['id']) ? $nom : "" ?>">
                
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" value="<?= !empty($_GET['id']) ? $prenom : "" ?>">
                
                <label for="telephone">Téléphone</label>
                <input type="tel" name="telephone" id="telephone" value="<?= !empty($_GET['id']) ? $tel : "" ?>">
                
                <label for="adresse">Adresse</label>
                <!-- <textarea type="text" name="adresse" id="adresse" rows="3" cols="10" value="<\?= !empty($_GET['id']) ? $adresse : "" ?>"></textarea> -->
                <input type="text" name="adresse" id="adresse" rows="3" value="<?= !empty($_GET['id']) ? $adresse : "" ?>">
                
                <button type="submit" name="valider"><?= !empty($_GET['id']) ? "Enregistrer les modifications" : "Ajouter" ?></button>

                <?php if (!empty($_SESSION['message']['text']) && $_SESSION['message']['page'] == $filename) { ?>
                    <div class="alert <?= $_SESSION['message']['type'] ?>">
                        <?= $_SESSION['message']['text'] ?>
                    </div>
                <?php }?>
                
            </form>
        </div>

        <div class="box">
            <table class="mtable">
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Action</th>
                </tr>

            <?php
                $clients = getclient(null);
                if (!empty($clients)) {
                    foreach ($clients as $key => $value) {
                ?>

                    <tr>
                        <td><?= $value['nom'] ?></td>
                        <td><?= $value['prenom'] ?></td>
                        <td><?= $value['telephone'] ?></td>
                        <td><?= $value['adresse'] ?></td>
                        <td>
                            <a href="?id=<?= $value['id'] ?>"><i class="bx bx-edit-alt"></i></a>
                            <a onclick="clientSupprimer(<?= $value['id'] ?>)"><i class="bx bx-trash"></i></a>
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
    function clientSupprimer(id) {
        if (confirm("Voulez-vous vraiment supprimer ce client ?")) {
            window.location.href = "clientSupprimer.php?id=" + id;
        }
    }
</script>

<?php
include 'pied.php';
?>