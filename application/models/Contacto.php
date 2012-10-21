<?php

class Application_Model_Contacto extends Zend_Db_Table_Abstract
{
    protected $_name    = 'Contactos';
    protected $_primary = 'id';
    
    public function getAll()
    {
        return $this->fetchAll();
    }
    
// Método utilizado para agregar y actualizar datos de la tabla
    
    public function save($bind,$id = null)
    {
        if(is_null($id)){
            // Para insertar una tupla
            $row    = $this->createRow();
        }else{
            // Para actualizar una tupla
            $row    = $this->getRows($id);
        }
        
        /* Opción 1: Completar la tupla campo a campo
            $row->title     = $bind['title'];
            $row->full_text = $bind['full_text'];
        */
        // Opción 2: Completar la tupla desde un array.
        //           Esto es aplicable cuando tenemos campos en el formulario
        //           que tienen el mismo nombre de columna dentro de la tabla en la bd.

        $row->setFromArray($bind);
        
        return $row->save();
    }
    public function getRows($id)
    {
        $id     = (int)$id;
        
        $row    = $this->find($id)->current();
        
        return $row;
    }
    public function getContacto($id) 
    { 
        $id = (int)$id; 
        $row = $this->getRows($id); 
        if (!$row) { 
             throw new Exception("No se encuentra la fila $id"); 
        } 
        return $row->toArray(); 
    } 
}