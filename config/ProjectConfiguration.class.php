<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
    public function setup()
    {
        $this->enablePlugins('sfDoctrinePlugin');
        $this->enablePlugins('sfDoctrineGuardPlugin');
        $this->enablePlugins('sfImageTransformPlugin');
        $this->enablePlugins('sfFormExtraPlugin');
        $this->enablePlugins('sfAdminDashPlugin');
        $this->enablePlugins('ffttPlugin');
        // $this->enablePlugins('ffttAPI');
    }

    public function configureDoctrine(Doctrine_Manager $manager)
    {
        $manager->setCollate('utf8_unicode_ci');
        $manager->setCharset('utf8');
    }
}
