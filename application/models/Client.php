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
							if(empty($value)){
								$this->$method(NULL);
							}else{
								$this->$method($value);
							}
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

	public function setAddress($address)
	{
		$this->_address = $address;
		return $this;
	}
		public function getAddress()
	{
		return $this->_address;
	}

	public function setCity($city)
	{
		$this->_city = $city;
		return $this;
	}
		public function getCity()
	{
		return $this->_city;
	}

	public function setEmail($email)
	{
		$this->_email = $email;
		return $this;
	}
		public function getEmail()
	{
		return $this->_email;
	}


	public function setTel01($tel01)
	{
		$this->_tel01 = $tel01;
		return $this;
	}
		public function getTel01()
	{
		return $this->_tel01;
	}


	public function setTel02($tel02)
	{
		$this->_tel02 = $tel02;
		return $this;
	}
		public function getTel02()
	{
		return $this->_tel02;
	}

	public function setFax($fax)
	{
		$this->_fax = $fax;
		return $this;
	}
		public function getFax()
	{
		return $this->_fax;
	}

	public function setPhone($phone)
	{
		$this->_phone = $phone;
		return $this;
	}
		public function getPhone()
	{
		return $this->_phone;
	}

	public function setPrice_list($price_list)
	{
		$this->_price_list = $price_list;
		return $this;
	}
		public function getPrice_list()
	{
		return $this->_price_list;
	}

	public function setSeller($seller)
	{
		$this->_seller = $seller;
		return $this;
	}
		public function getSeller()
	{
		return $this->_seller;
	}

	public function setPayment_term($payment_term)
	{
		$this->_payment_term = $payment_term;
		return $this;
	}
		public function getPayment_term()
	{
		return $this->_payment_term;
	}

	public function setClient($client)
	{
		if($client === "on" or $client === '1'){
			$this->_client = 1;
		}else {
			$this->_client = 0;
		}
		return $this;
	}
		public function getClient()
	{
			return $this->_client;
	}

	public function setProvider($provider)
	{
		if($provider === "on" or $provider === '1'){
			$this->_provider = 1;
		}else {
			$this->_provider = 0;
		}
		return $this;
	}
		public function getProvider()
	{
		return $this->_provider;
	}

	public function setComment($comment)
	{
		$this->_comment = $comment;
		return $this;
	}
		public function getComment()
	{
		return $this->_comment;
	}

	public function setAccount_status($account_status)
	{
		if($account_status === "on" or $account_status === '1'){
			$this->_account_status = 1;
		}else {
			$this->_account_status = 0;
		}
		return $this;
	}
		public function getAccount_status()
	{
		return $this->_account_status;
	}

}
