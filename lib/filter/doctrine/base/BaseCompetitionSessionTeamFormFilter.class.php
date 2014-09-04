<?php

/**
 * CompetitionSessionTeam filter form base class.
 *
 * @package    esftt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCompetitionSessionTeamFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'team_id'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Team'), 'add_empty' => true)),
      'competition_session_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Session'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'team_id'                => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Team'), 'column' => 'id')),
      'competition_session_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Session'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('competition_session_team_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CompetitionSessionTeam';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'team_id'                => 'ForeignKey',
      'competition_session_id' => 'ForeignKey',
    );
  }
}
