<?php

namespace Ei\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Ei\StandardParser\CsvStandardParser;
use Ei\MessageParser;
use Ei\Model\Standard;

class MessageParseCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('message:parse')
            ->setDescription('Parse an EI standard')
            ->addArgument(
                'standardfilename',
                InputArgument::REQUIRED,
                'Standard filename'
            )
            ->addArgument(
                'messagefilename',
                InputArgument::REQUIRED,
                'Message filename'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $parser = new CsvStandardParser();
        $standardfilename = $input->getArgument('standardfilename');
        $csvdata = file_get_contents($standardfilename);
        $standard = $parser->parse($csvdata);
        

        $messagefilename = $input->getArgument('messagefilename');
        $messagedata = file_get_contents($messagefilename);
        $messageparser = new MessageParser();
        $message = $messageparser->parse($standard, $messagedata);
        
        print_r($message);

    }
}
