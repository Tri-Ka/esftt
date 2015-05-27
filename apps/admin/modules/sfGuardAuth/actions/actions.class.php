<?php

require_once sfConfig::get('sf_plugins_dir').'/sfDoctrineGuardPlugin/modules/sfGuardAuth/lib/BasesfGuardAuthActions.class.php';

/**
 * sfGuardAuth actions.
 *
 * @author     PopsiiT
 *
 * @version    SVN: $Id: actions.class.php 23810 2014-04-17 11:07:44Z
 */
class sfGuardAuthActions extends BasesfGuardAuthActions
{
    public function executeSignin($request) {  
		
    	parent::executeSignin($request);

    	$this->setLayout('layout_connect');

	}
}
