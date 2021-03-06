<div class="container-fluid" id="annonces">
    <div class="container">       
        <div class="row">
            <div class="col-md-12">
                <h2 class="center">Annonces</h2>
            </div>
        </div>
        <div class="zone-filtre row">
            <form>
                <div class="col-md-12">
                    <h3>Filtrer les annonces</h3>
                </div>
                <div class="col-md-5">
                    <div class="form-grp">
                        <label for="typeSport"><i class="fa fa-futbol-o" aria-hidden="true"></i>Type de sport</label>
                        <select class="form-control" id="typeSport" value="typeSport">
                            <option value="allType">Tout les types</option>
                            <?php
                            foreach($sportTypeList as $key => $type):
                            ?>
                            <option value="<?= strAttr($type->getType()); ?>"><?= ucfirst($type->getType()); ?></option>
                            <?php
                            endforeach
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <div class="form-grp">
                        <label for="sport"><i class="fa fa-futbol-o" aria-hidden="true"></i>Sport</label>
                        <select class="form-control" id="sport" value="sport">
                            <option value="allSport">Tout les sports</option>
                            <?php
                            foreach($sportsList as $key => $sport):
                            ?>
                            <option value="<?= strAttr($sport->getIntitule()); ?>"><?= ucfirst($sport->getIntitule()); ?></option>
                            <?php
                            endforeach
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-grp">
                        <label for="calendrierAnnoncesPublie"><i class="fa fa-calendar" aria-hidden="true"></i>Chercher des annonces par tranche de date </label>
                        <div id="calendrierAnnoncesPublie" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                            <span></span> <b class="caret"></b>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <div class="form-grp">
                        <label for="calendrierActivitesPrevu"><i class="fa fa-calendar" aria-hidden="true"></i>Chercher des activité par tranche de date</label>
                        <div id="calendrierActivitesPrevu" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                            <span></span> <b class="caret"></b>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-grp">
                        <label for="city"><i class="fa fa-map-marker" aria-hidden="true"></i>Ville</label>
                        <input id="city" type="text" name="city" class="form-control">
                        <span class="help-block"><i class="fa fa-lightbulb-o" aria-hidden="true"></i>Paramètre non pris en compte si le champ est vide</span>
                        <div id="output"></div>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <div class="form-grp">
                        <label for="code"><i class="fa fa-map-marker" aria-hidden="true"></i>Code Postal</label>
                        <input id="code" type="text" name="code" class="form-control">
                        <span class="help-block"><i class="fa fa-lightbulb-o" aria-hidden="true"></i>Paramètre non pris en compte si le champ est vide</span>
                    </div>
                </div>
                <div class="col-md-5"></div>
                <div class="col-md-2">
                    <button id="filtre" type="button" class="btn btn-success btn-lg btn-block">Filtrer</button>
                </div>
                <div class="col-md-5"></div>
            </form>
        </div>
        <div id="display-annonces" class="row">
            <?php foreach ($annoncesList as $key => $annonce): ?>
            <div class="row">
                <div class="annonce">
                    <div class="row">
                        <div class="col-md-6">   
                            <h3><?= $annonce->getTitre(); ?></h3>
                        </div>
                        <div class="col-md-6 datePublication">   
                            <span><span class="libel">Date de publication :</span> <?= $annonce->getDatePublication(); ?></span>
                        </div>
                    </div>
                    <div class="row description">
                        <div class="col-md-6">
                            <p><?= $annonce->getDescription(); ?></p>
                        </div>
                        <div class="col-md-6">
                            <ul>
                                <li><span class="libel">Date de l'événement :</span> <?= $annonce->getDateEvenement(); ?></li>
                                <li><span class="libel">Nombre de participant max :</span> <?= $annonce->getNbParticipant(); ?></li>
                                <li><span class="libel">Lieu de l'événenement :</span> <?= $annonce->getCodePostal(); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>