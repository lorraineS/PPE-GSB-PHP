<div class="container">
    <div class="form-signin" style="width: 450px; margin: 0 auto;">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">GSB l Connectez-vous</h3>
            </div>
            <div class="panel-body">
                <form method="POST" action="index.php?uc=connexion&action=valideConnexion">
                    <fieldset>
                        <div class="form-group">
                            <input id="login" type="text" name="login" placeholder="Nom d'utilisateur" class="form-control" autofocus>
                        </div>
                        <div class="form-group">
                            <input id="mdp"  type="password"  name="mdp" placeholder="Mot de passe" class="form-control">
                        </div>
                        <button type="submit" name="valider" class="btn btn-primary"><i class="fa fa-sign-in"></i> Valider</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>