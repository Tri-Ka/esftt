<?php

/**
 * BaseCompetitionSession
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property date $date
 * @property integer $competition_id
 * @property Competition $Competition
 * @property Doctrine_Collection $Sessions
 * 
 * @method date                getDate()           Returns the current record's "date" value
 * @method integer             getCompetitionId()  Returns the current record's "competition_id" value
 * @method Competition         getCompetition()    Returns the current record's "Competition" value
 * @method Doctrine_Collection getSessions()       Returns the current record's "Sessions" collection
 * @method CompetitionSession  setDate()           Sets the current record's "date" value
 * @method CompetitionSession  setCompetitionId()  Sets the current record's "competition_id" value
 * @method CompetitionSession  setCompetition()    Sets the current record's "Competition" value
 * @method CompetitionSession  setSessions()       Sets the current record's "Sessions" collection
 * 
 * @package    esftt
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCompetitionSession extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('competition_session');
        $this->hasColumn('date', 'date', null, array(
             'type' => 'date',
             'notnull' => true,
             ));
        $this->hasColumn('competition_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Competition', array(
             'local' => 'competition_id',
             'foreign' => 'id'));

        $this->hasMany('CompetitionSessionTeam as Sessions', array(
             'local' => 'id',
             'foreign' => 'competition_session_id'));
    }
}