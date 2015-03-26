<?php

namespace Ei\Model;

use Ei\Model\RecordType;

class Record
{
    private $recordType;
    private $code;
    private $elements = array();
    
    public function __construct(RecordType $recordType)
    {
        $this->recordType = $recordType;
        $this->code = $recordType->getCode();
    }
    
    public function getCode()
    {
        return $this->code;
    }
    
    public function addElement(Element $e)
    {
        $this->elements[$e->getCode()] = $e;
    }
    
    public function getElementByCode($code)
    {
        return $this->elements[$code];
    }
}
