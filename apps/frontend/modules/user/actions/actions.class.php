<?php

/**
 * user actions.
 *
 * @author     Etienne atcharry <datcharrye@gmail.com>
 *
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends sfActions
{
    public function executeShow(sfWebRequest $request)
    {
        $this->user = sfGuardUserTable::getInstance()->find($request->getParameter('id'));

        if (null !== $this->user->getLicence()) {
            $serv = new Service();
            $this->infosJoueur = $serv->getJoueur($this->user->getLicence());
            $this->infosParties = $serv->getJoueurParties($this->user->getLicence());

            if (0 < count($this->infosParties)) {
                $nbVic = 0;
                $nbDef = 0;

                $this->arrayStats = array();

                foreach ($this->infosParties as $infosPartie) {
                    if ('D' == $infosPartie['vd']) {
                        ++$nbDef;
                    } elseif ('V' == $infosPartie['vd']) {
                        ++$nbVic;
                    }

                    if (!isset($this->arrayStats[$infosPartie['date']])) {
                        $this->arrayStats[$infosPartie['date']] = 0;
                    }

                    $this->arrayStats[$infosPartie['date']] = $this->arrayStats[$infosPartie['date']] + ($infosPartie['pointres'] * $infosPartie['coefchamp']);
                }

                $this->arrayStats = array_reverse($this->arrayStats);
                $this->arrayStatsGlob = array();
                $valInit = $this->infosJoueur['valinit'];

                foreach ($this->arrayStats as $key => $num) {
                    $this->arrayStatsGlob[$key] = $valInit + $num;
                    $valInit = $this->arrayStatsGlob[$key];
                }

                $this->jsonStats = array();

                foreach ($this->arrayStatsGlob as $date => $value) {
                    $this->jsonStats[] = array('y' => $date, 'value' => $value);
                }

                $this->arrayStatsGlobJson = json_encode($this->jsonStats);

                $this->ratioDef = number_format($nbDef * 100 / count($this->infosParties), 0);
                $this->ratioVic = number_format($nbVic * 100 / count($this->infosParties), 0);

                $this->maxVal = floor(max($this->arrayStatsGlob) + 50);
                $this->minVal = floor(min($this->arrayStatsGlob) - 50);

                $this->pieChart = json_encode(
                    array(
                        array('label' => 'Victoires', 'value' => $nbVic),
                        array('label' => 'Defaites', 'value' => $nbDef),
                    )
                );
            }
        }
    }

    public function executeMyAccount(sfWebRequest $request)
    {
        $this->user = sfGuardUserTable::getInstance()->find($this->getUser()->getGuardUser()->getId());
        $this->form = new sfGuardUserFrontendForm($this->user);

        if ($this->form->bindAndValid($request)) {
            $this->form->save();
            $this->redirect('my_account');
        }
    }

    public function executeNewPostCount(sfWebRequest $request)
    {
        $this->getResponse()->setHttpHeader('Content-Type', 'application/json; charset=utf-8');

        if ($this->getUser()->isAuthenticated()) {
            $user = $this->getUser()->getGuardUser();
            $newPostCount = 0;
            $cookieName = 'esftt_newposts_'.$user->getId();

            $newPosts = ForumPostTable::getInstance()->findFromDate($user->getLastVisit(), $user);

            if (null === $this->getRequest()->getCookie($cookieName)) {
                $newPostString = '';
            } else {
                $newPostString = $this->getRequest()->getCookie($cookieName);
                $newPostArray = explode('-', $newPostString);
                $newPostCount = count($newPostArray) - 1;
            }

            foreach ($newPosts as $post) {
                if (false === strpos($newPostString, $post->getId().'-')) {
                    $newPostString .= $post->getId().'-';
                    ++$newPostCount;
                }
            }
            $this->getResponse()->setCookie($cookieName, $newPostString);
            $this->newMessagesNumber = $newPostCount;

            $user = $this->getUser()->getGuardUser();
            $user->setLastVisit(Date('Y-m-d H:i:s'));
            $user->save();
        } else {
            $this->newMessagesNumber = 0;
        }

        $newPostArray = explode('-', $newPostString);
        unset($newPostArray[count($newPostArray) - 1]);
        $this->topicIdsWithNewPosts = array();
        if (0 < count($newPostArray)) {
            $this->topicsWithNewPosts = ForumTopicTable::getInstance()->findByPostIds($newPostArray);

            foreach ($this->topicsWithNewPosts as $topic) {
                $this->topicIdsWithNewPosts[] = $topic->getId();
            }
        }

        $data['template'] = $this->getPartial('user/notif', array('newMessagesNumber' => $this->newMessagesNumber));
        $data['topcisIds'] = $this->topicIdsWithNewPosts;

        return $this->renderText(json_encode($data));
    }
}
