<?php

namespace Ei\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Ei\StandardParser\CsvStandardParser;
use Ei\Model\Standard;

class SpecParseCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('standard:parse')
            ->setDescription('Parse an EI standard')
            ->addArgument(
                'filename',
                InputArgument::REQUIRED,
                'Filename'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $parser = new CsvStandardParser();
        $filename = $input->getArgument('filename');
        $csvdata = file_get_contents($filename);
        $standard = $parser->parse($csvdata);
        
        print_r($standard);
        
    }
}
