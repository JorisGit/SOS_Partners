<script type="text/javascript" src="<?= $path['js']; ?>jquery.js"></script>       
<script type="text/javascript" src="<?= $path['bootstrap']; ?>js/bootstrap.min.js"></script>
<?php if($p == $page['annonces']): ?>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<?php endif;

if(file_exists($path['js'].$p.'.js')):
?>
<script type="text/javascript" src="<?= $path['js'].$p.'.js'; ?>"></script>
<?php
endif;
?>
