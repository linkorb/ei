<?php

namespace Ei\Model;

use Ei\Model\Standard;
use Ei\Model\Record;

class Message
{
    private $standard;
    private $records = array();
    
    public function __construct(Standard $standard)
    {
        $this->standard = $standard;
    }
    
    public function addRecord(Record $record)
    {
        $this->records[] = $record;
    }
    
    public function getRecords()
    {
        return $this->records;
    }
}
