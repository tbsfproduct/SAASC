<?php

class IndexController extends Zend_Controller_Action
{

  
    public function init()
    {
        $this->view->baseUrl = $this->_request->getBaseUrl();
        
    }
    
    public function preDispatch()
    {
        if (Application_Model_User::isLoggedIn()) {
            $this->view->loggedIn   = true;
            $this->view->user       = Application_Model_User::getIdentity();
        }
    }

    public function indexAction()
    {
        
    }


}

