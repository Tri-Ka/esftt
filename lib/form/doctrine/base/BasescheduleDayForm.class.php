<?php

/**
 * scheduleDay form base class.
 *
 * @method scheduleDay getObject() Returns the current form's model object
 *
 * @package    esftt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasescheduleDayForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'day'         => new sfWidgetFormInputText(),
      'info'        => new sfWidgetFormInputText(),
      'hours'       => new sfWidgetFormInputText(),
      'category_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'day'         => new sfValidatorString(array('max_length' => 255)),
      'info'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'hours'       => new sfValidatorString(array('max_length' => 255)),
      'category_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Category'))),
    ));

    $this->widgetSchema->setNameFormat('schedule_day[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'scheduleDay';
  }

}
