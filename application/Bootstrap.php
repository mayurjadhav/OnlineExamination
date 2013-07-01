<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
   protected function _initAutoloaders() {
    $loader = new Zend_Application_Module_Autoloader(array(
      'namespace' => 'Application',
      'basePath' => APPLICATION_PATH
    ));
    return $loader;
  }

  protected function _initDoctype() {
    $this->bootstrap('view');
    $view = $this->getResource('view');
    $view->doctype('XHTML1_STRICT');
  }

  public function _initDbAdapter() {
    $this->bootstrap('db');
    $dbAdapter = $this->getResource('db');
    Zend_Registry::set('dbAdapter', $dbAdapter);
  }

   protected function _initViewDoctype() {
        $view = new Zend_View();
        $view->addHelperPath('ZendX/JQuery/View/Helper', 'ZendX_JQuery_View_Helper');
        $viewRenderer = new Zend_Controller_Action_Helper_ViewRenderer();
        $viewRenderer->setView($view);
        Zend_Controller_Action_HelperBroker::addHelper($viewRenderer);
    }
}

