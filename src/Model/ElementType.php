<?php

namespace Ei\Model;

class ElementType
{
    private $code;
    private $name;

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
    
    private $type = '?';
    
    public function getType()
    {
        return $this->type;
    }
    
    public function setType($type)
    {
        $this->type = $type;
    }
    
    private $length;
    
    public function getLength()
    {
        return $this->length;
    }
    
    public function setLength($length)
    {
        $this->length = $length;
    }
    
    private $pattern;
    
    public function getPattern()
    {
        return $this->pattern;
    }
    
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;
    }
    
    private $endPosition;
    
    public function getEndPosition()
    {
        return $this->pos;
    }
    
    public function setEndPosition($pos)
    {
        $this->pos = $pos;
    }
    
    private $requirement;
    
    public function getRequirement()
    {
        return $this->requirement;
    }
    
    public function setRequirement($requirement)
    {
        $this->requirement = $requirement;
    }
    
    
}
