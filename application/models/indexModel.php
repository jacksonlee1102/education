<?php

class Application_Model_IndexModel {

    protected $_db;

    public function __construct() {
        $dbOption = Zend_Registry::get('dbOption');
        $db = Zend_Db::factory($dbOption['adapter'], $dbOption['params']);
        $db->setFetchMode(Zend_Db::FETCH_ASSOC);
        $db->query("SET NAMES 'utf8'");
        $db->query("SET CHARACTER SET 'utf8'");
        $this->_db = $db;
    }
    
    public function getName(){
        $sql = $this->_db->select()->from('abxxx')->where('1=1');
        $result = $this->_db->fetchAll($sql);
        return $result;
    }

}

