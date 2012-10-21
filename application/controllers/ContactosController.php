<?php

class ContactosController extends Zend_Controller_Action
{
    
    public function init()
    {
      $this->view->baseUrl = $this->_request->getBaseUrl();
        
    }
    public function preDispatch()
    {
        if (Application_Model_User::isLoggedIn()) {
            $this->view->loggedIn   = true;
            $this->view->user       = Application_Model_User::getIdentity();
        }
    }
    public function indexAction(){
        return $this->_redirect('/contactos/listar/');
    }
    public function listarAction() 
    {
        $model  = new Application_Model_Contacto();
        
        // Sin paginador:
        // $this->view->test_zf = $model->getAll();
        
        // Con paginador:
        $contactos    = $model->getAll();
        
        Zend_View_Helper_PaginationControl::setDefaultViewPartial('paginator/items.phtml');
        
        $paginador  = Zend_Paginator::factory($contactos);
        
        // Setear la cantidad máxima de datos por página:
        $max_por_pagina = 8;
        $paginador->setItemCountPerPage($max_por_pagina); 
        
        
        if($this->_hasParam('page')){
            $paginador->setCurrentPageNumber($this->_getParam('page'));
        }
        $this->view->paginador = $paginador;
    }
    
    public function agregarAction()
    {
        
        $form   = new Application_Form_Contacto();
        
        $form->setAction($this->getRequest()->getBaseUrl().'/contactos/agregar/')->setMethod('post');
        
        if($this->getRequest()->isPost()){
            
            if($form->isValid($this->_getAllParams()) ){
                
                $model  = new Application_Model_Contacto();
                
                $model->save( $form->getValues());
                
                return $this->_redirect("/contactos/listar/");
                
            }
        }
        
        $this->view->form = $form;
    }
    public function actualizarAction()
    {
        if(!$this->_hasParam('id')){
            return $this->_redirect("/contactos/listar/");
            
        }
        $form   = new Application_Form_Contacto();
        $model = new Application_Model_Contacto();

        if($this->getRequest()->isPost()){

            if($form->isValid($this->_getAllParams()) ){

                $model  = new Application_Model_Contacto();

                $model->save( $form->getValues(),$this->_getParam('id'));

                return $this->_redirect("/contactos/listar/");

            }
        }else{
            
            $row = $model->getRows($this->_getParam('id'));
            
            if($row){
                $form->populate($row->toArray());
            }
            
        }
        
        $this->view->form = $form;
    }
    
    public function eliminarAction()
    {
        if(!$this->_hasParam('id')){
            return $this->_redirect("/contactos/listar/");
            
        }
        $model  = new Application_Model_Contacto();        
        $row    = $model->getRows($this->_getParam('id'));
        
        if($row){
            $row->delete();
        }
        
        return $this->_redirect("/contactos/listar/");
        
    }
    public function verAction(){
        
        if(!$this->_hasParam('id')){
            return $this->_redirect("/contactos/listar/");
            
        }
        $model = new Application_Model_Contacto();
        
        $cto   = $model->getContacto($this->_getParam('id'));
        
        $this->view->contacto = $cto;
    }
    
}