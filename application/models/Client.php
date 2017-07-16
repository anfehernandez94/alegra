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

	public function __construct(array $options = null)
	{
			if (is_array($options)) {
					$this->setOptions($options);
			}
	}

	public function setOptions(array $options)
	{
			$methods = get_class_methods($this);
			foreach ($options as $key => $value) {
					$method = 'set' . ucfirst($key);
					if (in_array($method, $methods)) {
							$this->$method($value);
					}
			}
			return $this;
	}

	public function convert2Array(){
			$clients = array();
			foreach ($this as $key => $value) {
					$key = substr($key, 1);
					$clients[$key] = $value;
			}
			return $clients;
	}

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
		return $this->_name;
	}

	public function setNit($nit)
	{
		$this->_nit = $nit;
		return $this;
	}
		public function getNit()
	{
		return $this->_nit;
	}

}
