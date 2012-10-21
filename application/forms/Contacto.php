<?php

class Application_Form_Contacto extends Zend_Form
{
    public function init()
    {
       // Traducción de errores de Zend/Validate
        
        require_once 'Zend/Validate/NotEmpty.php';
        require_once 'Zend/Validate/StringLength.php';
        require_once 'Zend/Validate/EmailAddress.php';
        
        $errores    = array(
            Zend_Validate_NotEmpty::IS_EMPTY            => 'El campo no puede estar vacío.',
            Zend_Validate_StringLength::TOO_LONG        => 'El campo debe contener por lo menos %min% caracteres.',
            Zend_Validate_StringLength::TOO_SHORT       => 'El campo debe contener un máximo de %max% caracteres.',
            Zend_Validate_EmailAddress::INVALID         => 'La dirección de correo no es válida.',
            Zend_Validate_EmailAddress::QUOTED_STRING   => "'%localPart%' no concuerda con el formato de comillas.",
            Zend_Validate_EmailAddress::DOT_ATOM        => "'%localPart%' no concuerda con el formato de punto.",
            Zend_Validate_EmailAddress::INVALID_HOSTNAME    => "'%hostname%' no es un nombre de dominio válido.",
            Zend_Validate_EmailAddress::INVALID_LOCAL_PART  => "'%localPart%' no es una parte local válida.",
            Zend_Validate_EmailAddress::INVALID_MX_RECORD   => "'%hostname%' no tiene un dominio de correo asignado.",            
            
            Zend_Validate_EmailAddress::INVALID_FORMAT      => "'%value%' no es una dirección válida de correo electrónico en el formato básico: nombre@dominio",
            Zend_Validate_EmailAddress::INVALID_SEGMENT     => "'% hostname%' no está en un segmento de red enrutable. '% Value%' de la dirección de correo electrónico no deben ser resueltas de la red pública.",
            Zend_Validate_EmailAddress::LENGTH_EXCEEDED     => "'% value%' supera la longitud permitida."
        );
        
        $traduccion = new Zend_Translate('array', $errores);  
        Zend_Form::setDefaultTranslator($traduccion);
       
       // Definimos los elementos para el formulario
        $formulario = new Zend_Form();
        $nombre     = $formulario->createElement('text', 'nombre')
     				->setLabel('Nombre Completo')     				
         			->setRequired(true);
        
        $fono       = $formulario->createElement('text', 'fono')
     				->setLabel('Teléfono')     				
         			->setRequired(true);
        
        $email      = new Zend_Form_Element_Text('email');
        $email->addValidator('EmailAddress')->setLabel('E-Mail')
         		->addValidator('stringLength', false, array(6, 30))
         		->setRequired(true);
        
        $direccion  = $formulario->createElement('text', 'direccion')->setLabel('Dirección')->setRequired(true);
        
        
        // Agregamos los elementos al formulario
        
        $this->addElement($nombre);
        $this->addElement($fono);
        $this->addElement($email);
        $this->addElement($direccion);
        $this->addElement(
                'submit','Guardar',array(
                    'class' => 'btn primary',
                    'label' => 'Guardar Contacto'
                )
        );
    }
}