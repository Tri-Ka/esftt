<?php

/**
 * contactForm
 *
 * @subpackage form
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
      'from' => new sfValidatorString(),
      'subject' => new sfValidatorString(),
      'content' => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('contact[%s]');
  }
}