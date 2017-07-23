<?php

class Application_Model_PriceListMapper
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
					$this->setDbTable('Application_Model_DbTable_PriceList');
			}
			return $this->_dbTable;
	}

	public function fetchAll()
	{
			$resultSet = $this->getDbTable()->fetchAll();
			$entries   = array();
			foreach ($resultSet as $row) {
					$entry = new Application_Model_PriceList();
					$entry	->setId(htmlentities($row->id))
									->setDescription(htmlentities($row->description));
					$entries[] = $entry->convert2Array();
			}
			return $entries;
	}

	public function fetchRowById($id){

			$select = $this->getDbTable()->fetchAll("id=".$id);
			if(empty($select)){
					return false;
			}
			$arr_reverse = array_reverse((array)$select);
			$rowRaw = array_pop($arr_reverse)[0];
			//$client = new Application_Model_Client($clientRaw);
			return $rowRaw;
	}

}
