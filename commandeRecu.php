<?php
include 'entete.php';



if (!empty($_GET['id'])) {

  $commande2 = getcommande($_GET['id']);
  foreach ($commande2 as $key => $value) {
    $date = $value['date_commande'];
    $id = $value['id'];
    //echo $na;
  }
}
?>
<div class="home-content">
  <div class="print_btn">
    <button id="btn_print"> <i class='bx bxs-printer'></i> Imprimer</button>
  </div>
  <div class="page" id='page'>
    </br>
    </br>
    </br>
    </br>
    <div class="cote-a-cote">
      <h2> Recu De Commande </h2>

      <div>
        <p> Recu N°# :
          <?= $id ?>
        </p>
        <p> Date de la commande :
          <?= $date ?>
        </p>
      </div>

    </div>

    <div class="cote-a-cote" style="width:37%;">
      <p> Nom : </p>
      <p>
        <?= $value['nom_client'] ?>
      </p>
    </div>

    <div class="cote-a-cote" style="width:35%;">
      <p> Tel : </p>
      <p>
        <?= $value['telephone'] ?>
      </p>
    </div>


    <div class="cote-a-cote" style="width:65%;">
      <p> Adresse : </p>
      <p>
        <?= $value['adresse'] ?>
      </p>
    </div>


    </br>
    </br>
    <table class="mtable">
      <tr>
        <th>Designation</th>
        <th>Quantite</th>
        <th>Prix unitaire</th>
        <th>Prix total</th>


      </tr>


      <tr>

        <td>
          <?= $value['nom_article'] ?>
        </td>
        <td>
          <?= $value['quantite'] ?>
        </td>
        <td>
          <?= $value['prix_unitaire'] ?>
        </td>
        <td>
          <?= $value['prix'] ?>
        </td>


      </tr>



    </table>
  </div>

</div>






<?php
include 'pied.php';
?>

<script>
  /*
  // Select the element with the ID "btn_print"
  const printButton = document.querySelector('#btn_print');
  
  // Add an event listener to the button so that when it is clicked, the window will print
  printButton.addEventListener('click', () => {
    window.print();
  });
  */

  const printButton = document.querySelector('#btn_print');
  const pageToPrint = document.querySelector('#page');

  printButton.addEventListener('click', () => {
    const printContents = pageToPrint.innerHTML;
    const originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    location.reload();
  });

</script>