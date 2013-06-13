<?php

class IndexController extends Zend_Controller_Action
{
    public function init()
    {
        $this->model = new Application_Model_IndexModel();
    }

    public function indexAction()
    {
        
    }


}

