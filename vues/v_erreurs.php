<div class="container">
    <div class ="alert alert-danger" style="width: 450px; margin: 15px auto;">
        <?php
        foreach($_REQUEST['erreurs'] as $erreur) {
              echo "$erreur";
        }
        ?>
    </div>
</div>
