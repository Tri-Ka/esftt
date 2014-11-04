<?php

/**
 * CompetitionSessionDisponibility form base class.
 *
 * @method CompetitionSessionDisponibility getObject() Returns the current form's model object
 *
 * @package    esftt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCompetitionSessionDisponibilityForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'      => new sfWidgetFormInputHidden(),
      'session_id'   => new sfWidgetFormInputHidden(),
      'is_available' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'user_id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('user_id')), 'empty_value' => $this->getObject()->get('user_id'), 'required' => false)),
      'session_id'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('session_id')), 'empty_value' => $this->getObject()->get('session_id'), 'required' => false)),
      'is_available' => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('competition_session_disponibility[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CompetitionSessionDisponibility';
  }

}
