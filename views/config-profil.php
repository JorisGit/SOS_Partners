<div class="container-fluid" id="config-profil">
    <div class="container">
        <form autocomplete="off" action="" method="post">
            <div class="row">
                <h2 class="center">Modifier mon profil</h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3><i class="fa fa-lock" aria-hidden="true"></i>Modifier votre mot de passe</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="mdp-label">Nouveau mot de passe</label>
                        <input id="nouveaumdp" name="nouveaumdp" type="password" placeholder="Votre nouveau mot de passe" class="form-control" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="newmdp-label">Confirmation du nouveau mot de passe</label>
                        <input id="nouveaumdpconfirm" name="nouveaumdpconfirm" type="password" placeholder="Votre nouveau mot de passe" class="form-control input-md" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3><i class="fa fa-envelope" aria-hidden="true"></i>Changer d'adresse mail</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="email-label">Votre nouvelle adresse mail</label>
                        <input id="email" name="email" type="email" placeholder="Votre nouvelle adresse mail" class="form-control input-md" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="newemail-label">Votre nouvelle adresse mail</label>
                        <input id="newemail" name="newemail" type="email" placeholder="Votre nouvelle adresse mail (confirmation)" class="form-control input-md" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3><i class="fa fa-trash" aria-hidden="true"></i>Supprimer votre compte</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-grp check-grp">
                        <div class="[ form-group ]">
                            <input type="checkbox" name="supprimer-compte" id="supprimer-compte" autocomplete="off" data-toggle="modal" data-target="#myModal"/>
                            <div class="[ btn-group ]">
                                <label for="supprimer-compte" class="[ btn btn-primary ]">
                                    <span class="[ glyphicon glyphicon-ok ]"></span>
                                    <span> </span>
                                </label>
                                <label for="supprimer-compte" class="[ btn btn-default active ]" >
                                    Je supprime mon compte définitivement
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Suppression de compte</h4>
                                </div>
                                <div class="modal-body">
                                    <p>En cochant cette case et en cliquant sur le bouton "Confirmer", votre compte sera supprimé.</p>
                                    <p>Il sera possible de le récupérer dans les 15 jours qui suivent après la suppression de votre compte en contactant le support.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Je confirme</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3><i class="fa fa-thumbs-up" aria-hidden="true"></i>Confirmer le/les changement(s)</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="mdp-label">Mot de passe actuel</label>
                        <input id="mdp-confirm" name="mdp" type="password" placeholder="Votre mot de passe actuel" class="form-control input-md" required>
                        <span class="help-block"><i class="fa fa-lightbulb-o" aria-hidden="true"></i>
                        Vous devez entrer votre mot de passe pour pouvoir effectuer les changements demandés</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                    <input class="btn btn-primary" type="submit" name="confirm" value="Confirmer">
                </div>
            </div>
            </form>
    </div>
</div>
