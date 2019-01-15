<?php

class homepageComponents extends sfComponents
{
    public function executeSignin(sfWebRequest $request)
    {
        $this->form = new sfGuardFormSigninFe();
    }

    public function executeSlider(sfWebRequest $request)
    {
        $this->pictures = CoverTable::getInstance()->findOrdered();
    }

    public function executeMenuLeft()
    {
        $this->events = EventTable::getInstance()->findToCome(0);
        $this->competitions = EventTable::getInstance()->findToCome(1);
        $this->sponsors = SponsorTable::getInstance()->findAll();
    }
}
