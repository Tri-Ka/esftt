<?php

class homepageComponents extends sfComponents
{
    public function executeSignin(sfWebRequest $request)
    {
        $class = sfConfig::get('app_sf_guard_plugin_signin_form', 'sfGuardFormSignin');
        
        $this->form = new $class();
        $user = $this->getUser();

        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter('signin'));
            if ($this->form->isValid()) {
                $values = $this->form->getValues();
                $this->getUser()->signin($values['user'], array_key_exists('remember', $values) ? $values['remember'] : false);

                $signinUrl = sfConfig::get('app_sf_guard_plugin_success_signin_url', $user->getReferer($request->getReferer()));
                
                return $this->redirect('' != $signinUrl ? $signinUrl : '@homepage');
            }
        } 

    }

}
