<div class="box col-xs-12 text-center">
    <div class="box-title">
        <?php echo __('Administration'); ?>
    </div>

    <div class="box-content marged-top">
        <ul class="nav nav-pills nav-stacked nav-tabs">
            <li class="<?php echo 'articleList' == $sf_params->get('action') ? 'active' : ''; ?>"><a href="<?php echo url_for('admin_article_list'); ?>"><?php echo __('Articles'); ?></a></li>
        </ul>
        <ul class="nav nav-pills nav-stacked nav-tabs">
            <li class="<?php echo 'userList' == $sf_params->get('action') ? 'active' : ''; ?>"><a href="<?php echo url_for('admin_user_list'); ?>"><?php echo __('Utilisateurs'); ?></a></li>
        </ul>
    </div>
</div>
