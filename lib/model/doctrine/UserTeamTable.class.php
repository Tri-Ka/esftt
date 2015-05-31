<?php

/**
 * UserTeamTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class UserTeamTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object UserTeamTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('UserTeam');
    }

    public function findOneByUserIdAndTeamId($userId, $teamId)
    {
    	$q = $this->createQuery('tu')
    	->andWhere('tu.user_id = ?', array($userId))
    	->andWhere('tu.team_id = ?', array($teamId));

    	return $q->execute()->getFirst();
    }
}