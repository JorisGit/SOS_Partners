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
                        <label for="typeSport">Type de sport</label>
                        <select class="form-control" id="typeSport" value="typeSport">
                            <option value="allType">Tout les types</option>
                            <?php
                            foreach($sportTypeList as $key => $type):
                            ?>
                            <option value="<?= str_replace(' ', '-', strtolower($type->getType())); ?>"><?= ucfirst($type->getType()); ?></option>
                            <?php
                            endforeach
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <div class="form-grp">
                        <label for="sport">Sport</label>
                        <select class="form-control" id="sport" value="sport">
                            <option value="allSport">Tout les sports</option>
                            <?php
                            foreach($sportsList as $key => $sport):
                            ?>
                            <option value="<?= str_replace(' ', '-', strtolower($sport->getIntitule())); ?>"><?= ucfirst($sport->getIntitule()); ?></option>
                            <?php
                            endforeach
                            ?>
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <div class="row display-annonces">

        </div>
    </div>
</div>