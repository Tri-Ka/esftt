<div class="col-xs-12 col-sm-4 col-md-3">

    <div class="no-box-title marged-bottom">
        <?php echo __('Menu'); ?>
    </div>

    <div class="box col-xs-12 text-center marged-bottom">

        <div class="box-content marged-top">
            <ul class="nav nav-pills nav-stacked nav-tabs">
                <li class="<?php echo !isset($active) || $active == 'forum' ? 'active' : ''; ?>"><a href="<?php echo url_for('forum'); ?>"><?php echo __('Forum'); ?>  <i class="fa fa-comments-o"></i></a></li>
    <!--             <li><a href="#"><?php echo __('Championnat départemental'); ?></a></li>
                <li><a href="#"><?php echo __('Championnat de Paris'); ?></a></li>
                <li><a href="#"><?php echo __('Fichiers'); ?></a></li>
                <li><a href="#"><?php echo __('Adhérents'); ?></a></li> -->
                <li class="<?php echo !isset($active) || $active == 'files' ? 'active' : ''; ?>"><a href="<?php echo url_for('files'); ?>"><?php echo __('Documents'); ?> <i class="fa fa-files-o"></i></a></li>
                <hr>
                <li class="<?php echo isset($active) && $active == 'account' ? 'active' : ''; ?>"><a href="<?php echo url_for('my_account'); ?>"><?php echo __('Mon compte'); ?></a></li>
            </ul>
        </div>
    </div>

</div>
