        <script>
            
            let sidebar = document.querySelector(".sidebar");
            let sidebarBtn = document.querySelector(".sidebarBtn");
            sidebarBtn.onclick = function () {
                sidebar.classList.toggle("active");
                if (sidebar.classList.contains("active")) {
                    sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
                } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
            };

            function venteAnnuler(id_vente, id_article, quantite) {
                if (confirm("Voulez-vous vraiment annuler cette vente ?")) {
                    window.location.href = "venteAnnuler.php?idv=" + id_vente + "&ida=" + id_article + "&q=" + quantite;
                }
            };

            function commandeAnnuler(id_commande, id_article, quantite) {
                if (confirm("Voulez-vous vraiment annuler cette commande ?")) {
                    window.location.href = "commandeAnnuler.php?idc=" + id_commande + "&ida=" + id_article + "&q=" + quantite;
                }
            };

            function setprix() {
                var article = document.querySelector('#id_article');
                var quantite = document.querySelector('#quantite');
                var prix = document.querySelector('#prix');

                /* var qteDispo = articlesQty[article.selectedIndex];
                var qteDispoShow = document.querySelector('#articleQuantite');
                qteDispoShow.innerHTML = qteDispo; */

                var qteDispo = article.options[article.selectedIndex].getAttribute('data-qte');
                var qteDispoShow = document.querySelector('#articleQuantite');
                qteDispoShow.innerHTML = qteDispo;

                var prix_unitaire = article.options[article.selectedIndex].getAttribute('data-prix');
                var output = Number(quantite.value) * Number(prix_unitaire);
                prix.value = Math.round(output * 100) / 100;
            };

        </script>
    </body>
</html>