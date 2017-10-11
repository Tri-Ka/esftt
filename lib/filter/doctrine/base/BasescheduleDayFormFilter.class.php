<?php

/**
 * scheduleDay filter form base class.
 *
 * @package    esftt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasescheduleDayFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'day'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'info'        => new sfWidgetFormFilterInput(),
      'hours'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'category_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'day'         => new sfValidatorPass(array('required' => false)),
      'info'        => new sfValidatorPass(array('required' => false)),
      'hours'       => new sfValidatorPass(array('required' => false)),
      'category_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Category'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('schedule_day_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'scheduleDay';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'day'         => 'Text',
      'info'        => 'Text',
      'hours'       => 'Text',
      'category_id' => 'ForeignKey',
    );
  }
}
