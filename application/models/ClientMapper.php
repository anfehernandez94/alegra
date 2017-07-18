<?php

class Application_Model_ClientMapper
{
	private $_dbTable;

  public function setDbTable($dbTable)
  {
      if (is_string($dbTable)) {
          $dbTable = new $dbTable();
      }
      if (!$dbTable instanceof Zend_Db_Table_Abstract) {
          throw new Exception('Invalid table data gateway provided');
      }
      $this->_dbTable = $dbTable;
      return $this;
  }

  public function getDbTable()
  {
      if (null === $this->_dbTable) {
          $this->setDbTable('Application_Model_DbTable_Client');
      }
      return $this->_dbTable;
  }

	public function createClient($client)
	{
		$this->getDbTable()->insert($client);
	}

	public function updateClient($client, $id)
	{
		$this->getDbTable()->update($client, $id);
	}

	public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Client();
            $entry	->setId($row->id)
										->setName($row->name)
										->setNit($row->nit)
										->setTel01($row->tel01)
										->setComment($row->comment);
            $entries[] = $entry->convert2Array();
        }
        return $entries;
    }

}
