<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    protected function _initAutoload() {
        $autoloader = new Zend_Application_Module_Autoloader(array('namespace' => '', 'basePath' => APPLICATION_PATH)
        );

        return $autoloader;
    }

    protected function _initDb() {

        $dbOption = $this->getOption('resources');
        $dbOption = $dbOption['db'];

        // Setup database
        $db = Zend_Db::factory($dbOption['adapter'], $dbOption['params']);

        $db->setFetchMode(Zend_Db::FETCH_ASSOC);
        $db->query("SET NAMES 'utf8'");
        $db->query("SET CHARACTER SET 'utf8'");

        Zend_Registry::set('dbOption', $dbOption);

        //Khi thiet lap che do nay model moi co the su dung duoc
        Zend_Db_Table::setDefaultAdapter($db);

        // Return it, so that it can be stored by the bootstrap
        return $db;
    }

    protected function _initSession() {
        Zend_Session::start();
    }

    public function _initView() {
        // init view
        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('ViewRenderer');
        if (null == $viewRenderer->view)
            $viewRenderer->initView();
        $view = $viewRenderer->view;

        if (is_object($view)) {
            $view->doctype('XHTML1_STRICT');

            // set application charset
            $view->charset = 'UTF-8';

            // build the root url
            $request = new Zend_Controller_Request_Http();
            $siteUrl = $request->getScheme() . '://' . $request->getHttpHost();
            $view->host = $siteUrl;
            $basePath = $request->getBasePath();
            $siteUrl = ($basePath == '') ? $siteUrl : $siteUrl . '/' . ltrim($basePath, '/');
            $view->baseUrl = $siteUrl;
            $siteUrl = $siteUrl . '/index.php';
            $view->rootUrl = $siteUrl;
        }
    }

    public function _initHelper() {
        Zend_Controller_Action_HelperBroker::addPath(
                APPLICATION_PATH . '/modules/default/controllers/helpers/', 'Zend_Controller_Action_Helper'
        );
    }

}

