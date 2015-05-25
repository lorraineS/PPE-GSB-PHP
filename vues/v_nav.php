<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Galaxy Swiss Bourdin</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <!--<li class="active"><a href="#">Accueil</a></li>-->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#"><?php echo $_SESSION['prenom']."  ".$_SESSION['nom']; ?></a>
                </li>
                <li><a href="index.php?uc=connexion&action=deconnexion" style="font-size: 11px; padding-left: 0px ">(Déconnexion)</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
