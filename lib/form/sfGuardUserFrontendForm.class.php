<?php

class sfGuardUserFrontendForm extends BasesfGuardUserForm
{

    public function configure()
    {

        sfApplicationConfiguration::getActive()->loadHelpers(array('Url'));

        $this->useFields(array(
          'email_address',
          'password',
          'username',
          'avatar'
        ));

        $this->widgetSchema['password'] = new sfWidgetFormInputPassword();
        $this->validatorSchema['password'] = new sfValidatorPass();

        // avatar
        $this->widgetSchema['avatar'] = new sfWidgetFormInputFileEditable(array(
          'file_src' => $this->getObject()->retrievePictureUrl(),
          'is_image' => true,
          'edit_mode' => !$this->isNew() && null != $this->getObject()->getAvatar(),
        ));

        $this->validatorSchema['avatar'] = new sfValidatorFileImage(array(
            'required'   => false,
            'path'       => sfConfig::get('sf_upload_dir').'/users',
            'min_height' =>  0,
            'min_width'  =>  0,
            'max_height' =>  99999999,
            'max_width'  =>  99999999,
            'mime_types' => 'web_images',
        ));

        $this->validatorSchema['email_address'] = new sfValidatorEmail(array('required' => true));

        $this->widgetSchema['password_again'] = new sfWidgetFormInputPassword();
        $this->validatorSchema['password_again'] = clone $this->validatorSchema['password'];

        $this->widgetSchema->moveField('password_again', 'after', 'password');

        $this->mergePostValidator(new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL, 'password_again', array(), array('invalid' => 'The two passwords must be the same.')));

        $this->widgetSchema['email_address']->setLabel('Adresse E-mail');
        $this->widgetSchema['password']->setLabel('Mot de passe');
        $this->widgetSchema['username']->setLabel('Pseudonyme');
        $this->widgetSchema['password_again']->setLabel('Répeter le mot de passe');

        $this->widgetSchema->setFormFormatterName('BootstrapForm');

    }

    /**
     * @see sfFormObject
     */
    public function doSave($con = null)
    {

        parent::doSave($con);

        $user = $this->getObject();

        $directory = $user->retrieveHashedPictureDirectory(false);

        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }

        $picture = $this->getValue('avatar');

        if (!is_null($picture)) {

            $old = $picture->getSavedName();
            $img = new sfImage($old, $picture->getType());
            $img->thumbnail(200, 200, 'center');
            $img->saveAs($directory . DIRECTORY_SEPARATOR . $user->getAvatar());

            @unlink($old);
        }

        $this->getObject()->refresh(true);

    }

}