<?php

namespace App\Console;


use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class DuplicateCommand extends Command
{
    protected function configure(): void
    {
        $this->setName('duplicate')
            ->setDescription('Provide a number as an argument, and the duplicate function will multiply it with 2')
            ->setHelp('Try again with a different number.')
            ->addArgument('number', InputArgument::REQUIRED, 'Please provide a valid number');//we define here how to handle an argument
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        //this is the way how we get the argument from cli to our app
        $number = $input->getArgument('number');
        //this is the way how we output the result
        $output->writeln($number * 2);
        return Command::SUCCESS;
    }
}
