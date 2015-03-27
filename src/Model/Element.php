<?php

namespace Ei\Model;

use Ei\Model\ElementType;

class Element
{
    private $elementType;
    private $code;
    
    public function __construct(ElementType $et)
    {
        $this->elementType = $et;
        $this->code = $et->getCode();
    }
    
    public function getCode()
    {
        return $this->code;
    }
    
    private $value;
    
    public function getValue()
    {
        return $this->value;
    }
    
    public function setValue($value)
    {
        $this->value = $value;
    }
    
    public function getType()
    {
        return $this->elementType;
    }
    
}
