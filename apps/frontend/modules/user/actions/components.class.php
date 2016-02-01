<?php

class userComponents extends sfComponents
{
    public function executeNotif(sfWebRequest $request)
    {
        if ($this->getUser()->isAuthenticated()) {
            $user = $this->getUser()->getGuardUser();

            if (null === $user->getLastVisit()) {
                $user->setLastVisit(Date('Y-m-d H:i:s'));
                $user->save();
            }

            $this->newMessagesNumber = ForumPostTable::getInstance()->findFromDate($this->getUser()->getGuardUser()->getLastVisit(), $user)->count();
        } else {
            $this->newMessagesNumber = 0;
        }
    }
}
