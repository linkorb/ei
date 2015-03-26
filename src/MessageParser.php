<?php

namespace Ei;

use Ei\Model\Message;
use Ei\Model\Record;
use Ei\Model\Element;
use Ei\Model\Standard;
use RuntimeException;

class MessageParser
{
    public function parse(Standard $standard, $data)
    {
        $m = new Message($standard);
        $lines = explode("\n", $data);
        foreach ($lines as $line) {
            if ($line) {
                //echo $line;
                $code = substr($line, 0, 2);
                if (!$standard->hasRecordType($code)) {
                    throw new RuntimeException("Standard does not contain recordtype definition for code " . $code);
                }
                $recordType = $standard->getRecordType($code);
                $record = new Record($recordType);
                $m->addRecord($record);
                
                foreach ($recordType->getElementTypes() as $et)
                {
                    $end = $et->getEndPosition();
                    $len = $et->getLength();
                    $start = $end - $len;
                    $value = substr($line, $start, $len);
                    $e = new Element($et);
                    $e->setValue($value);
                    $record->addElement($e);
                }
            }
            
        }
        return $m;
    }
}
