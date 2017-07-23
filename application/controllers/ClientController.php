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
      $clients = $clientMapper->fetchAll();
      $this->view->entries = array('Total'=>count($clients),'Clients'=>$clients);
    }

	   public function addAction()
  	{
      $request = $this->getRequest();

      if ($this->getRequest()->isPost()) {
          if(isset($_POST['name'])){
               $client = new Application_Model_Client((array)$_POST);
               $clientMapper = new Application_Model_ClientMapper();
               $clientMapper->createClient($client->convert2Array());
               return $this->_helper->redirector('index');
          }
      }

      $paymentTermMapper = new Application_Model_PaymentTermMapper();
      $paymentTerm = $paymentTermMapper->fetchAll();
      $priceListMapper = new Application_Model_PriceListMapper();
      $priceList = $priceListMapper->fetchAll();
      $sellerMapper = new Application_Model_SellerMapper();
      $seller = $sellerMapper->fetchAll();

      $this->view->entries =  array('payment_term'=>$paymentTerm,
                                    'price_list'=>$priceList,
                                    'seller'=>$seller);

  		//$this->view->form = NULL;
  	}

    public function editAction()
   {
       $request = $this->getRequest();
       if ($this->getRequest()->isPost()) {
         if(isset($_POST['id'])){

              $client = new Application_Model_Client((array)$_POST);

              $clientMapper = new Application_Model_ClientMapper();

              $clientMapper->updateClient($client->convert2Array(), $client->getId());
              return $this->_helper->redirector('index');
         }
       }elseif ($this->getRequest()->isGet()) {
          if(isset($_GET['id'])){
              $id = $_GET['id'];
              if(is_numeric($id)){
                  $clientMapper = new Application_Model_ClientMapper();
                  $client = $clientMapper->fetchRowById($id);
                  if($client){
                      $paymentTermMapper = new Application_Model_PaymentTermMapper();
                      $paymentTerm = $paymentTermMapper->fetchAll();
                      $priceListMapper = new Application_Model_PriceListMapper();
                      $priceList = $priceListMapper->fetchAll();
                      $sellerMapper = new Application_Model_SellerMapper();
                      $seller = $sellerMapper->fetchAll();

                      $this->view->entries =  array('client'=>$client,
                                                  'payment_term'=>$paymentTerm,
                                                  'price_list'=>$priceList,
                                                  'seller'=>$seller);
                  }else{
                      return $this->_helper->redirector('index');
                  }
              }else{
                  return $this->_helper->redirector('index');
              }
          }else{
              return $this->_helper->redirector('index');
          }
       }

       $this->view->form = NULL;

   }

   public function deleteAction()
  {
      $request = $this->getRequest();
      if ($this->getRequest()->isGet()) {
         if(isset($_GET['id'])){
             $id = $_GET['id'];
             if(is_numeric($id)){
                 $clientMapper = new Application_Model_ClientMapper();
                 $clientMapper->deleteClient($id);
                 return $this->_helper->redirector('index');
             }else{
                 return $this->_helper->redirector('index');
             }
         }else{
             return $this->_helper->redirector('index');
         }
      }

      $this->view->form = NULL;

  }


  public function viewAction()
 {
   if ($this->getRequest()->isGet()) {
      if(isset($_GET['id'])){
          $id = ($_GET['id']);
          if(is_numeric($id)){
              $clientMapper = new Application_Model_ClientMapper();
              $client = $clientMapper->fetchRowById($id);
              if($client){
                  $paymentTermMapper = new Application_Model_PaymentTermMapper();
                  $paymentTerm = $paymentTermMapper->fetchAll();
                  $priceListMapper = new Application_Model_PriceListMapper();
                  $priceList = $priceListMapper->fetchAll();
                  $sellerMapper = new Application_Model_SellerMapper();
                  $seller = $sellerMapper->fetchAll();

                  $this->view->viewClient =  array('client'=>$client,
                                              'payment_term'=>$paymentTerm,
                                              'price_list'=>$priceList,
                                              'seller'=>$seller);
              }else{
                  return $this->_helper->redirector('index');
              }
          }else{
              return $this->_helper->redirector('index');
          }
      }else{
          return $this->_helper->redirector('index');
      }
   }

 }


}
