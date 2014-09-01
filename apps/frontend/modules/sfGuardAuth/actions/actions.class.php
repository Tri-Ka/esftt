<?php

require_once(sfConfig::get('sf_plugins_dir') . '/sfDoctrineGuardPlugin/modules/sfGuardAuth/lib/BasesfGuardAuthActions.class.php');

/**
 * sfGuardAuth actions.
 *
 * @package    Orange ooi
 * @subpackage
 * @author     PopsiiT
 * @version    SVN: $Id: actions.class.php 23810 2014-04-17 11:07:44Z
 */
class sfGuardAuthActions extends BasesfGuardAuthActions
{
    /**
     * Executes Signin action
     *
     * @param sfRequest $request A request object
     */
    public function executeSignin($request)
    {

        $user = $this->getUser();

        if ($user->isAuthenticated()) {
            return $this->redirect('homepage');
        }

        $class = sfConfig::get('app_sf_guard_plugin_signin_form', 'sfGuardFormSignin');
        $this->form = new $class();

        if ($request->isMethod('post')) {

            $this->form->bind($request->getParameter('signin'));

            if ($this->form->isValid()) {

                $values = $this->form->getValues();

                $this->getUser()->signin($values['user'], array_key_exists('remember', $values) ? $values['remember'] : false);

            }

        }

        $signinUrl = sfConfig::get('app_sf_guard_plugin_success_signin_url', $user->getAttribute('url'));
        return $this->redirect('' != $signinUrl ? $signinUrl : '@homepage');
        
    }


}
