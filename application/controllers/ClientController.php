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
    $request = $this->getRequest();
		$form = new Application_Form_NewClient();
    if ($this->getRequest()->isPost()) {
        if ($form->isValid($request->getPost())) {
            $client = new Application_Model_Client($form->getValues());
            $clientMapper  = new Application_Model_ClientMapper();
            //$clientMapper->createClient($client->convert2Array());
            
            if(isset($_POST['save'])){
                return $this->_helper->redirector('index');
            }
            if(isset($_POST['saveAndOther'])){
                return $this->_helper->redirector('add');
            }
            return $this->_helper->redirector('index');
        }
    }

		$this->view->form = $form;
	}

}
