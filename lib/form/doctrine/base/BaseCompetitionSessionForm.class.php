<?php

/**
 * CompetitionSession form base class.
 *
 * @method CompetitionSession getObject() Returns the current form's model object
 *
 * @package    esftt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCompetitionSessionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'date'           => new sfWidgetFormDate(),
      'competition_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Competition'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'date'           => new sfValidatorDate(),
      'competition_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Competition'))),
    ));

    $this->widgetSchema->setNameFormat('competition_session[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CompetitionSession';
  }

}
