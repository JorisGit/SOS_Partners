<div class="container-fluid" id="mon-profil">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="text-center">
                    <img src="<?= $path['avatars'].$_SESSION['avatar'];?>" class="avatar img-circle img-thumbnail" alt="avatar">
                </div>
            </div>
            <h3><?php echo ucfirst($infoProfil->getPrenom()).' '.ucfirst($infoProfil->getNom()) ;?></h3>
        </div>
        <hr>
        <div id="profil_annonce">
            <form autocomplete="off" action="" method="post">
                <div class="row">
                    <input id="titre_annonce" name="titre_annonce" type="text" placeholder="Entrer le titre de l'annonce ..." class="form-control input-md">
                </div>
                <div class="row">
                    <input id="commentaire_annonce" name="commentaire_annonce" type="text" placeholder="Entrer votre annnonce ..." class="form-control input-md">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input class="btn btn-primary" type="submit" name="valide_annonce" value="Publier">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>