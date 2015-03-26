<?php

namespace Ei\StandardParser;

use Ei\Model\Standard;
use Ei\Model\RecordType;
use Ei\Model\ElementType;

class CsvStandardParser
{
    private $lineseperator;
    private $fieldseperator;
    public function __construct($lineseperator = "\r", $fieldseperator = ";")
    {
        $this->lineseperator = $lineseperator;
        $this->fieldseperator = $fieldseperator;
    }
    
    public function parse($data)
    {
        $standard = new Standard();
        
        $a = array();
        $lines = explode($this->lineseperator, $data);
        foreach ($lines as $line) {
            $row = str_getcsv($line, $this->fieldseperator);
            
            // Handle the recordType properties
            $recordtypename = $row[1];
            $recordtypecode = $row[2];
            if ($standard->hasRecordType($recordtypecode)) {
                $recordType = $standard->getRecordType($recordtypecode);
            } else {
                $recordType = new RecordType($recordtypecode, $recordtypename);
                $standard->addRecordType($recordType);
            }
            
            // Handle the element properties
            $code = $row[3];
            $name = $row[4];
            $elementType = new ElementType($code, $name);
            
            $elementType->setType($row[5]);
            $elementType->setLength($row[6]);
            $elementType->setPattern($row[7]);
            $elementType->setEndPosition($row[8]);
            
            $recordType->addElementType($elementType);
            
            
        }
        return $standard;
    }
}
