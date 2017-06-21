<div class="container-fluid" id="mon-profil">
    <div class="col-md-12 col-sm-6">
        <div class="container" id="container-profil">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="text-center">
                        <img src="<?= $path['avatars'].$_SESSION['avatar'];?>" class="avatar img-circle img-thumbnail" alt="avatar">
                    </div>
                </div>
                <h3><?php echo ucfirst($infoProfil->getPrenom()).' '.ucfirst($infoProfil->getNom()) ;?></h3>
                <div id="liste_choix">
                    <a class="btn btn-primary" id="choix_profil" href="#" data-toggle="modal" data-target="#ajoutAnnonce">
                        <div class="background_plus"></div>
                        <p>Ajouter une annonce</p>
                    </a>
                    <div class="modal fade" id="ajoutAnnonce" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Ajouter une nouvelle annonce</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label class="control-label" for="">Titre de l'annonce</label>
                                                <input id="titre" name="titre" type="text" placeholder="Titre de l'annonce" class="form-control input-md" >
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="control-label" for="">Nombre de participant(s)</label>
                                                <input id="nbParticipant" name="nbParticipant" type="number" placeholder="Nombre de participant(s)" class="form-control input-md" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="">Jour</label>
                                                <input id="date" min="1" max="31" name="jour" type="number" placeholder="JJ" class="form-control input-md" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="">Mois</label>
                                                <input id="date" min="1" max="12" name="mois" type="number" placeholder="MM" class="form-control input-md" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="">Annee</label>
                                                <input id="date" name="annee" type="number" placeholder="YYYY" class="form-control input-md" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label" for="">Code postal</label>
                                                <input id="code" name="code" type="text" placeholder="Code postal" class="form-control input-md" >
                                                <div id="output"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label" for="">Description</label>
                                                <textarea id="description" name="description" type="text" onkeyup="adapter" placeholder="Description" class="form-control input-md"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" name="ajouterannonce" class="btn btn-primary" data-dismiss="modal">Ajouter</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  