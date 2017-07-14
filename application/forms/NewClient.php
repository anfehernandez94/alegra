<?php

/*
	Formulario para la creación de clientes
*/

class Application_Form_NewClient extends Zend_Form
{

    public function init()
    {
        $this->setAttrib('action', 'index');
		$this->setAttrib('method', 'post');
		
		$this->addElement('text', 'name', array(
			'label' 	=> 'Name',
			'required' 	=> true			
		));
		$this->addElement('text', 'nit', array(
			'label' 	=> 'NIT'
		));
		$this->addElement('text', 'address', array(
			'label' 	=> 'Address'
		));
		$this->addElement('text', 'city',array(
			'label' 	=> 'City'
		));
		$this->addElement('text', 'email', array(
			'label'			=> 'Email',
			'filters' 		=> array('StringTrim'),
			'validators'	=> array('EmailAddress')
		));
		$this->addElement('text', 'tel01',array(
			'label' 	=> 'Telephone 1'
		));
		$this->addElement('text', 'tel02',array(
			'label' 	=> 'Telephone 2'
		));
		$this->addElement('text', 'fax',array(
			'label' 	=> 'Fax'
		));
		$this->addElement('text', 'phone',array(
			'label' 	=> 'Cell phone'
		));	
		$this->addElement('select', 'price_list',array(
			'label' 	=> 'Price List'
		));
		$this->addElement('select', 'seller',array(
			'label' 	=> 'Seller'
		));
		$this->addElement('select', 'payment_term',array(
			'label' 	=> 'Payment term'
		));
		$this->addElement('checkbox', 'client',array(
			'label' 	=> 'Client',
			'value'		=> true
		));
		$this->addElement('checkbox', 'provider',array(
			'label' 	=> 'Provider'
		));
		$this->addElement('textarea', 'comment',array(
			'label' 	=> 'Comment'
		));
		$this->addElement('checkbox', 'account_status',array(
			'label' 	=> 'Include account status',
			'value'		=> true
		));
		
		//$this->addElement('submit', 'Cancel');
		//$this->addElement('submit', 'Save and create other');
		$this->addElement('submit', 'Save');

    }


}

