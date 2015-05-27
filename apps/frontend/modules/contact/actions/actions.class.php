<?php

/**
 * homapage actions.
 *
 * @author     Etienne atcharry <datcharrye@gmail.com>
 *
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contactActions extends sfActions
{
    public function executeNew(sfWebRequest $request)
    {
        $this->form = new contactForm();

        if ($this->form->bindAndValid($request)) {
            $dispatcher = new sfEventDispatcher();
            $mailer = new sfMailer($dispatcher, array());

            $to = sfConfig::get('app_mail_to');

            $mailer->composeAndSend($this->form->getValue('from'), $to, '[contact ESFTT] - '.$this->form->getValue('subject'), $this->form->getValue('content'));

            $this->setTemplate('messageSent');
        }
    }
}
