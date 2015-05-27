<?php

/**
 * contactForm.
 */
class contactForm extends BaseForm
{
  /**
   * @see sfForm
   */
  public function setup()
  {
      $this->setWidgets(array(
      'from' => new sfWidgetFormInputText(),
      'subject' => new sfWidgetFormInputText(),
      'content' => new sfWidgetFormTextarea(),
    ));

      $this->setValidators(array(
      'from' => new sfValidatorEmail(array('required' => true)),
      'subject' => new sfValidatorString(array('required' => true)),
      'content' => new sfValidatorString(array('required' => true)),
    ));

      $this->widgetSchema->setNameFormat('contact[%s]');
  }
}
