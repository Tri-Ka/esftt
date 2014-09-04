<?php

/**
 * CompetitionSession filter form base class.
 *
 * @package    esftt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCompetitionSessionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'date'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'competition_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Competition'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'date'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'competition_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Competition'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('competition_session_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CompetitionSession';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'date'           => 'Date',
      'competition_id' => 'ForeignKey',
    );
  }
}
