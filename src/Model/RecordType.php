<?php

namespace Ei\Model;

class RecordType
{
    private $code;
    private $name;
    private $elementTypes = array();

    public function __construct($code, $name = '')
    {
        $this->code = $code;
        $this->name = $name;
    }
    
    
    public function getCode()
    {
        return $this->code;
    }
    
    public function setCode($code)
    {
        $this->code = $code;
    }
    
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function addElementType(ElementType $e)
    {
        $this->elementTypes[$e->getCode()] = $e;
    }
    
    public function getElementTypes()
    {
        return $this->elementTypes;
    }

}
