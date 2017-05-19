<div class="container-fluid" id="inscription">
    <div class="container">
    <?php if(isset($alert)) { ?>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="alert alert-danger center" role="alert"><span class="glyphicon glyphicon-alert"></span> <?php echo $alert; ?></div>
            </div>
        </div>
    <?php } ?>
        <div class="row">
            <h2 class="center">Inscription</h2>
        </div>
        <form action="" method="post" accept-charset="UTF-8" autocomplete="off">
            <div class="row rowspace">
                <div class="col-md-2"></div>
                <div class="col-md-8 sos-form sos-form-brd">
                    <h3>Informations du compte</h3>
                    <div class="form-grp">
                        <label for="pseudo">Pseudo</label>
                        <input type="text" name="pseudo" id="pseudo" placeholder="Votre pseudo" value="<?php if(isset($user['pseudo'])) echo $user['pseudo']; ?>" required>
                    </div>
                    <div class="form-grp">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Votre adresse email" value="<?php if(isset($user['email'])) echo $user['email']; ?>" required>
                    </div>
                    <div class="form-grp">
                        <label for="mdp">Mot de passe</label>
                        <input type="password" name="mdp" id="mdp" placeholder="Votre mot de passe" required>
                    </div>
                    <div class="form-grp">
                        <label for="mdp2">Confirmation</label>
                        <input type="password" name="mdp2" id="mdp2" placeholder="Confirmer votre mot de passe" required>
                    </div>    
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 sos-form sos-form-brd">
                    <h3>Informations personnelles</h3>
                    <div class="form-grp">
                        <label for="prenom">Prénom</label>
                        <input type="text" name="prenom" id="prenom" placeholder="Votre prénom" value="<?php if(isset($user['prenom'])) echo $user['prenom']; ?>" required>
                    </div>
                    <div class="form-grp">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" id="nom" placeholder="Votre nom" value="<?php if(isset($user['nom'])) echo $user['nom']; ?>" required>
                    </div>
                    <div class="form-grp">
                        <label for="sexe">Sexe</label>
                        <select name="sexe" id="sexe" required>
                            <option value="">Votre sexe</option>
                            <option value="Femme" <?php if(isset($user['sexe']) && $user['sexe'] == 'Femme') echo 'selected'; ?>>Femme</option>
                            <option value="Homme" <?php if(isset($user['sexe']) && $user['sexe'] == 'Homme') echo 'selected'; ?>>Homme</option>
                        </select>
                    </div>
                    <div class="form-grp">
                        <label for="datenaissance">Votre date de naissance</label>
                        <div class="datenaissance">
                            <input type="text" name="jour" class="jourmois" id="datenaissance" placeholder="JJ" value="<?php if(isset($user['jour'])) echo $user['jour']; ?>" required>
                            <input type="text" name="mois" class="jourmois" placeholder="MM" value="<?php if(isset($user['mois'])) echo $user['mois']; ?>" required>
                            <input type="text" name="annee" class="annee" placeholder="YYYY" value="<?php if(isset($user['annee'])) echo $user['annee']; ?>" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 sos-form sos-form-brd">
                    <h3>Géolocalisation</h3>
                    <div class="form-grp">
                        <label for="departement">Département</label>
                        <input type="text" name="departement" id="departement" placeholder="Renseignez votre département" value="<?php if(isset($user['departement'])) echo $user['departement']; ?>" required>
                    </div>
                    <div class="form-grp">
                        <label for="ville">Ville</label>
                        <input type="text" name="ville" id="ville" value="<?php if(isset($user['ville'])) echo $user['ville']; ?>" placeholder="Renseignez votre ville">
                        <span class="infosupp">Ce champ est facultatif, utile si vous voulez cherchez des annonces dans votre ville uniquement</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 sos-form sos-form-brd">
                    <h3>S'inscrire</h3>
                    <div class="form-grp check-grp">
                        <div class="[ form-group ]">
                            <input type="checkbox" name="newsletter" id="newsletter" autocomplete="off" <?php if(isset($user['newsletter']) && $user['newsletter'] == 'on') echo 'checked'; ?>/>
                            <div class="[ btn-group ]">
                                <label for="newsletter" class="[ btn btn-primary ]">
                                    <span class="[ glyphicon glyphicon-ok ]"></span>
                                    <span> </span>
                                </label>
                                <label for="newsletter" class="[ btn btn-default active ]">
                                    Newsletter
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-grp check-grp">
                        <div class="[ form-group ]">
                            <input type="checkbox" name="cgu" id="cgu" autocomplete="off" required/>
                            <div class="[ btn-group ]">
                                <label for="cgu" class="[ btn btn-primary ]" for="cgu">
                                    <span class="[ glyphicon glyphicon-ok ]"></span>
                                    <span> </span>
                                </label>
                                <label for="cgu" class="[ btn btn-default active ]" for="cgu">
                                    J'accepte les CGU
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-grp check-grp">
                        <input type="submit" class="btn btn-primary" name="inscription" value="Je m'inscris">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>