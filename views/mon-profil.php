<div class="container-fluid" id="mon-profil">
    <div class="row">
            <div class="col-md-12">
                <h2 class="center">Mon Profil</h2>
            </div>
        </div>
    <div class="col-md-12 col-sm-6">
        <div class="container" id="container-profil">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="text-center">
                        <img src="<?= $path['avatars'].$_SESSION['avatar'];?>" class="avatar img-circle img-thumbnail" alt="avatar">
                    </div>
                </div>
                <h3><?php echo ucfirst($myProfil->getPrenom()).' '.ucfirst($myProfil->getNom()) ;?></h3>
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
                                <form action="" method="post" accept-charset="UTF-8">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label class="control-label" for="">Titre de l'annonce</label>
                                                    <input id="titre" name="titre" type="text" placeholder="Titre de l'annonce" required="true" class="form-control input-md" >
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="control-label" for="">Nombre de participant(s)</label>
                                                    <input id="nbParticipant" name="nbParticipant" type="number" placeholder="Nombre de participant(s)" required="true" class="form-control input-md" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" for="">Jour</label>
                                                    <input id="date" min="1" max="31" name="jour" type="number" placeholder="JJ" required="true" class="form-control input-md" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" for="">Mois</label>
                                                    <input id="date" min="1" max="12" name="mois" type="number" placeholder="MM" required="true" class="form-control input-md" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" for="">Annee</label>
                                                    <input id="date" name="annee" type="number" placeholder="YYYY" required="true" class="form-control input-md" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="">Sport</label>
                                                    <select id="sport" name="sport" type="text" class="form-control input-md" >
                                                        <?php
                                                        foreach($sportList as $key => $sports):
                                                        ?>
                                                        <option value="<?= strAttr($sports->getIntitule()); ?>"><?= ucfirst($sports->getIntitule()); ?></option>
                                                        <?php
                                                        endforeach
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label" for="">Code postal</label>
                                                    <input id="code" name="code" type="text" placeholder="Code postal" required="true" class="form-control input-md" >
                                                    <div id="output"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="">Description</label>
                                                    <textarea id="description" name="description" type="text" onkeyup="adapter" placeholder="Description" required="true" class="form-control input-md"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" name="ajouterannonce" value="Ajouter une annnonce" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" id="mesAnnonces">
            <div class="row">
                <div class="col-md-5">
                    <h2>Mes Annonces</h2>
                </div>
            </div>
            <?php
            foreach($annoncesList as $key => $annonceListes):
            $SportAnnonce = $connexionSport->getIdSportAnnonce($annonceListes->getIdSport());
            ?>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="elements">
                        <div class="element">
                            <div class="title">
                                <div class="row">
                                    <div class="span7">
                                        <h2>
                                            <?php echo ucfirst($annonceListes->getTitre());?>
                                        </h2>
                                    </div>
                                    <div class="span2 pull-right date"><?php echo $annonceListes->getDatePublication();?></div>
                                </div>
                                <div class="row">
                                    <div class="span6">
                                        <div class="loc">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $annonceListes->getCodePostal();?>
                                        </div>
                                        <div class="sport">
                                            <i class="fa fa-futbol-o" aria-hidden="true"></i> <?php echo $SportAnnonce->getIntitule();?>
                                        </div>
                                        <div class="dateEven">
                                            <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $annonceListes->getDateEvenement();?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <?php echo $annonceListes->getDescription();?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            endforeach
            ?>
        </div>
    </div>
</div>  