<?php

class homepageComponents extends sfComponents
{
    public function executeSignin(sfWebRequest $request)
    {

        $this->form = new sfGuardFormSigninFe();

    }

}
