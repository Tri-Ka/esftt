<?php

/**
 * user actions.
 *
 * @package    esftt
 * @subpackage homepage
 * @author     Etienne atcharry <datcharrye@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends sfActions
{
	public function executeNew($request)
	{

		$this->form = new sfGuardUserFrontendForm();

		if ($this->form->bindAndValid($request)) {

            $user = $this->form->save();

            // if (null != $this->form->getValue('avatar')) {
                                
            //     $file = $this->form->getValue('avatar');
            //     $filename = 'uploaded_' . sha1($file->getOriginalName());
            //     $extension = $file->getExtension($file->getOriginalExtension());
            //     $file->save(sfConfig::get('sf_upload_dir') . '/avatars/' . $filename . $extension);
            //     $p = $this->form->getObject();
            //     $p->setAvatar($filename . $extension);
            //     $p->save();
            // }

            $this->getUser()->signin($user);

            $this->redirect('homepage');

        }

	}
}