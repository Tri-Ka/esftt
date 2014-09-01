<?php

/**
 * sfGuardFormSignin for sfGuardAuth signin action
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardFormSignin.class.php 23536 2009-11-02 21:41:21Z Kris.Wallsmith $
 */
class sfGuardFormSignin extends BasesfGuardFormSignin
{
  /**
   * @see sfForm
   */
  public function configure()
  {
      unset($this['remember']);
      
      $this->widgetSchema['username']->setLabel('Pseudo ou adresse mail');
      $this->widgetSchema['password']->setLabel('Mot de passe');
      
      $this->widgetSchema['username']->setAttribute('placeholder', 'pseudo ou adresse e-mail');
      $this->widgetSchema['password']->setAttribute('placeholder', 'password');
  }
}
