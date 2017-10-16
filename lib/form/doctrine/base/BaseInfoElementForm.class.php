<?php

/**
 * InfoElement form base class.
 *
 * @method InfoElement getObject() Returns the current form's model object
 *
 * @package    esftt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseInfoElementForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'title'    => new sfWidgetFormInputText(),
      'content'  => new sfWidgetFormTextarea(),
      'position' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'title'    => new sfValidatorString(array('max_length' => 255)),
      'content'  => new sfValidatorString(),
      'position' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('info_element[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'InfoElement';
  }

}
