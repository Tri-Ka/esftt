<?php

/**
 * Infos form base class.
 *
 * @method Infos getObject() Returns the current form's model object
 *
 * @package    esftt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseInfosForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'address' => new sfWidgetFormInputText(),
      'street'  => new sfWidgetFormInputText(),
      'city'    => new sfWidgetFormInputText(),
      'zipcode' => new sfWidgetFormInputText(),
      'phone'   => new sfWidgetFormInputText(),
      'email'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'address' => new sfValidatorString(array('max_length' => 255)),
      'street'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'city'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'zipcode' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'phone'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('infos[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Infos';
  }

}
