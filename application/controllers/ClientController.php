<?php

class ClientController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
		$clientMapper = new Application_Model_ClientMapper();
		$this->view->entries = $clientMapper->fetchAll();
    }
	
	public function addAction()
	{
		//$clientMapper = new Application_Model_ClientMapper();
		//$clientMapper->save();
		$form = new Application_Form_NewClient();
		$this->view->form = $form;
	}

}

