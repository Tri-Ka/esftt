<?php

/**
 * BasescheduleDay
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $day
 * @property string $info
 * @property string $hours
 * @property integer $category_id
 * @property scheduleCategory $Category
 * 
 * @method string           getDay()         Returns the current record's "day" value
 * @method string           getInfo()        Returns the current record's "info" value
 * @method string           getHours()       Returns the current record's "hours" value
 * @method integer          getCategoryId()  Returns the current record's "category_id" value
 * @method scheduleCategory getCategory()    Returns the current record's "Category" value
 * @method scheduleDay      setDay()         Sets the current record's "day" value
 * @method scheduleDay      setInfo()        Sets the current record's "info" value
 * @method scheduleDay      setHours()       Sets the current record's "hours" value
 * @method scheduleDay      setCategoryId()  Sets the current record's "category_id" value
 * @method scheduleDay      setCategory()    Sets the current record's "Category" value
 * 
 * @package    esftt
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasescheduleDay extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('schedule_day');
        $this->hasColumn('day', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('info', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('hours', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('category_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('scheduleCategory as Category', array(
             'local' => 'category_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));
    }
}