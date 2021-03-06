<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initViewHeadTitle()
    {
        $this->bootstrap('view');
        /* @var $view Zend_View_Abstract */
        $view = $this->getResource('view');
        $view->headTitle()->setSeparator(' :: ');
        $view->headTitle()->prepend('Postr');
    }

    protected function _initPagination()
    {
        Zend_View_Helper_PaginationControl::setDefaultViewPartial(
            'paginator.phtml'
        );
    }

    protected function _initNavigation()
    {
        $this->bootstrap('frontController');
        $pages = array(
            array(
                'label'         => 'Home',
                'id'            => 'index',
                'action'        => 'index',
                'controller'    => 'index',
            ),
            array(
                'label'         => 'Entries',
                'id'            => 'entry',
                'action'        => 'index',
                'controller'    => 'entry',
                'pages'         => array(
                    array(
                        'label'         => 'New',
                        'id'            => 'entry-new',
                        'action'        => 'new',
                        'controller'    => 'entry',
                    ),
                    array(
                        'action'        => 'get',
                        'controller'    => 'entry',
                        'visible'       => false,
                    ),
                    array(
                        'action'        => 'edit',
                        'controller'    => 'entry',
                        'visible'       => false,
                    ),
                    array(
                        'action'        => 'post',
                        'controller'    => 'entry',
                        'visible'       => false,
                    ),
                    array(
                        'action'        => 'put',
                        'controller'    => 'entry',
                        'visible'       => false,
                    ),
                    array(
                        'action'        => 'delete',
                        'controller'    => 'entry',
                        'visible'       => false,
                    ),
                ),
            ),
        );
        $resource = new Zend_Application_Resource_Navigation(
            array(
                'pages' => $pages,
            )
        );
        $resource->setBootstrap($this);
        return $resource->init();
    }
}
