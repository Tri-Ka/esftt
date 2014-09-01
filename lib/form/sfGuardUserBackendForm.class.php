<?php

class sfGuardUserBackendForm extends BasesfGuardUserForm
{

    public function configure()
    {

        sfApplicationConfiguration::getActive()->loadHelpers(array('Url'));

        $this->useFields(array(
          'email_address',
          'password',
          'username',
          'avatar',
          'groups_list',
          'author_id'
        ));

        $this->widgetSchema['password'] = new sfWidgetFormInputPassword();
        $this->validatorSchema['password'] = new sfValidatorPass();

        $this->widgetSchema['avatar'] = new sfWidgetFormInputFile();
        $this->validatorSchema['avatar'] = new sfValidatorFile(
            array(
              'required' => false,
              'max_size' => 250000,
              'mime_types' => 'web_images'
          ));

        $user = $this->getOption('user');

        $this->widgetSchema['author_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['author_id']->setDefault($user->getId());

        $this->validatorSchema['author_id'] = new sfValidatorPass();

    }

}