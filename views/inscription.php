<div class="container-fluid" id="inscription">
    <div class="container">
        <div class="row">
            <h2 class="center">Inscription</h2>
        </div>
        <div class="row rowspace">
            <form action="" method="post" accept-charset="UTF-8" autocomplete="off">
                <div class="col-md-5 sos-form sos-form-brd">
                    <h3>Informations du compte</h3>
                    <div class="form-grp">
                        <label for="pseudo">Pseudo</label>
                        <input type="text" name="pseudo" id="pseudo" placeholder="Votre pseudo">
                    </div>
                    <div class="form-grp">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Votre adresse email">
                    </div>
                    <div class="form-grp">
                        <label for="mdp">Mot de passe</label>
                        <input type="password" name="mdp" id="mdp" placeholder="Votre mot de passe">
                    </div>
                    <div class="form-grp">
                        <label for="mdp2">Confirmation</label>
                        <input type="password" name="mdp2" id="mdp2" placeholder="Confirmer votre mot de passe">
                    </div>    
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5 sos-form sos-form-brd">
                    <h3>Informations personnel</h3>
                    <div class="form-grp">
                        <label for="prenom">Prénom</label>
                        <input type="text" name="prenom" id="prenom" placeholder="Votre prénom">
                    </div>
                    <div class="form-grp">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" id="nom" placeholder="Votre nom">
                    </div>
                    <div class="form-grp">
                        <label for="sexe">Sexe</label>
                        <select id="sexe">
                            <option value="">Votre sexe</option>
                            <option value="femme">Femme</option>
                            <option value="homme">Homme</option>
                        </select>
                    </div>
                    <div class="form-grp">
                        <label for="datenaissance">Votre date de naissance</label>
                        <div class="datenaissance">
                            <input type="text" name="jour" class="jourmois" id="datenaissance" placeholder="JJ">
                            <input type="text" name="mois" class="jourmois" placeholder="MM">
                            <input type="text" name="annee" class="annee" placeholder="YYYY">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>