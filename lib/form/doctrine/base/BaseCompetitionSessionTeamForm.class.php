<?php

/**
 * CompetitionSessionTeam form base class.
 *
 * @method CompetitionSessionTeam getObject() Returns the current form's model object
 *
 * @package    esftt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCompetitionSessionTeamForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'team_id'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Team'), 'add_empty' => false)),
      'competition_session_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Session'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'team_id'                => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Team'))),
      'competition_session_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Session'))),
    ));

    $this->widgetSchema->setNameFormat('competition_session_team[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CompetitionSessionTeam';
  }

}
