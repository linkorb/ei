<?php

namespace Ei\Model;

class Standard
{
    private $code;
    
    public function getCode()
    {
        return $this->code;
    }
    
    public function setCode($code)
    {
        $this->code = $code;
    }
    
    private $recordTypes = array();
    

    public function hasRecordType($code)
    {
        if (isset($this->recordTypes[$code])) {
            return true;
        }
        return false;
    }
    
    public function getRecordType($code)
    {
        return $this->recordTypes[$code];
    }
    
    public function addRecordType(RecordType $type)
    {
        $this->recordTypes[$type->getCode()] = $type;
    }
}
