<?php

class Application_Model_Client
{

	private $_id;
	private $_name;
	private $_nit;
	private $_address;
	private $_city;
	private $_email;
	private $_tel01;
	private $_tel02;
	private $_fax;
	private $_phone;
	private $_price_list;
	private $_seller;
	private $_payment_term;
	private $_client;
	private $_provider;
	private $_comment;
	private $_account_status;
	
	//public function __set($name, $value);
    //public function __get($name);
	
    public function setId($id)
	{
		$this->_id = (int)$id;
		return $this;
	}
    public function getId()
	{
		return $this->_id;
	}
	
	public function setName($name)
	{
		$this->_name = $name;
		return $this;
	}
    public function getName()
	{
		echo "test";
		echo $this->_name;
		return $this->_name;
	}

}