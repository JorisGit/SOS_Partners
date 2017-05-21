<?php if(isset($alert)) { ?>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="alert alert-danger center .alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <span class="glyphicon glyphicon-alert position-icon"></span> <?php echo $alert; ?>
            </div>
        </div>
    </div>
<?php } ?>