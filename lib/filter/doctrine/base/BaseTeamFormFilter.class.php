<?php

/**
 * Team filter form base class.
 *
 * @package    esftt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTeamFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'type'       => new sfWidgetFormChoice(array('choices' => array('' => '', 'PH - Championnat de Paris' => 'PH - Championnat de Paris', 'PR - Championnat départemental' => 'PR - Championnat départemental', 'D2 - Championnat départemental' => 'D2 - Championnat départemental', 'D2 - Championnat de Paris' => 'D2 - Championnat de Paris', 'D3 - Championnat départemental' => 'D3 - Championnat départemental'))),
      'users_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardUser')),
    ));

    $this->setValidators(array(
      'name'       => new sfValidatorPass(array('required' => false)),
      'type'       => new sfValidatorChoice(array('required' => false, 'choices' => array('PH - Championnat de Paris' => 'PH - Championnat de Paris', 'PR - Championnat départemental' => 'PR - Championnat départemental', 'D2 - Championnat départemental' => 'D2 - Championnat départemental', 'D2 - Championnat de Paris' => 'D2 - Championnat de Paris', 'D3 - Championnat départemental' => 'D3 - Championnat départemental'))),
      'users_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardUser', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('team_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addUsersListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.UserTeam UserTeam')
      ->andWhereIn('UserTeam.user_name', $values)
    ;
  }

  public function getModelName()
  {
    return 'Team';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'name'       => 'Text',
      'type'       => 'Enum',
      'users_list' => 'ManyKey',
    );
  }
}
