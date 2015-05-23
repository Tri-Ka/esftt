<div class="row">

    <div class="col-xs-12 col-sm-4">

        <div class="box col-xs-12 text-center">
            <div class="box-title">
                <?php echo __('Administration'); ?>
            </div>
            <div class="box-content marged-top">
                <ul class="nav nav-pills nav-stacked nav-tabs">
                    <li class="active"><a href="#articles" aria-controls="home" role="tab" data-toggle="tab"><?php echo __('Articles'); ?></a></li>
                </ul>
            </div>
        </div>

    </div>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="articles"><?php include_component('article', 'list') ?></div>
    </div>

</div>

