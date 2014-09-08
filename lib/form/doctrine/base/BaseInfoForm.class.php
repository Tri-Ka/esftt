<?php

/**
 * Info form base class.
 *
 * @method Info getObject() Returns the current form's model object
 *
 * @package    esftt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseInfoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'company'  => new sfWidgetFormInputText(),
      'address'  => new sfWidgetFormInputText(),
      'city'     => new sfWidgetFormInputText(),
      'zipcode'  => new sfWidgetFormInputText(),
      'phone'    => new sfWidgetFormInputText(),
      'fullname' => new sfWidgetFormInputText(),
      'email'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'company'  => new sfValidatorString(array('max_length' => 255)),
      'address'  => new sfValidatorString(array('max_length' => 255)),
      'city'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'zipcode'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'phone'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fullname' => new sfValidatorString(array('max_length' => 255)),
      'email'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('info[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Info';
  }

}
