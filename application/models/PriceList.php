<?php

class Application_Model_PriceList
{

  private $_id;
  private $_description;

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
      $object = array();
      foreach ($this as $key => $value) {
          $key = substr($key, 1);
          $object[$key] = $value;
      }
      return $object;
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

	public function setDescription($description)
	{
		$this->_description = $description;
		return $this;
	}
  public function getDescription()
	{
		return $this->_description;
	}

}
