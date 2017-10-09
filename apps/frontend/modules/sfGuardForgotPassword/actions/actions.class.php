<?php

require_once sfConfig::get('sf_plugins_dir').'/sfDoctrineGuardPlugin/modules/sfGuardForgotPassword/lib/BasesfGuardForgotPasswordActions.class.php';

/**
 * sfGuardAuth actions.
 *
 * @author     PopsiiT
 *
 * @version    SVN: $Id: actions.class.php 23810 2014-04-17 11:07:44Z
 */
class sfGuardForgotPasswordActions extends BasesfGuardForgotPasswordActions
{
    public function executeIndex($request)
    {
        $this->form = new sfGuardRequestForgotPasswordForm();

        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter($this->form->getName()));
            if ($this->form->isValid()) {
                $this->user = $this->form->user;
                $this->_deleteOldUserForgotPasswordRecords();

                $forgotPassword = new sfGuardForgotPassword();
                $forgotPassword->user_id = $this->form->user->id;
                $forgotPassword->unique_key = md5(rand() + time());
                $forgotPassword->expires_at = new Doctrine_Expression('NOW()');
                $forgotPassword->save();

                $message = Swift_Message::newInstance()
                  ->setFrom(sfConfig::get('app_sf_guard_plugin_default_from_email', 'from@noreply.com'))
                  ->setTo($this->form->user->email_address)
                  ->setSubject('[ESFTT] - Mot de passe oublié')
                  ->setBody($this->getPartial('sfGuardForgotPassword/send_request', array('user' => $this->form->user, 'forgot_password' => $forgotPassword)))
                  ->setContentType('text/html')
                ;

                $dispatcher = new sfEventDispatcher();
                $mailer = new sfMailer($dispatcher, array());
                $mailer->Send($message);

                $this->getUser()->setFlash('notice', 'Un mail vous a été envoyé');
                $this->redirect('@sf_guard_signin');
            } else {
                $this->getUser()->setFlash('error', 'Invalid e-mail address!');
            }
        }
    }

    private function _deleteOldUserForgotPasswordRecords()
    {
        Doctrine_Core::getTable('sfGuardForgotPassword')
          ->createQuery('p')
          ->delete()
          ->where('p.user_id = ?', $this->user->id)
          ->execute();
    }
}
