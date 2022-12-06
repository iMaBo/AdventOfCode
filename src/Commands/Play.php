<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Play extends Command
{
    protected static $defaultName = 'play';

    protected static $defaultDescription = 'Play the game!';

    protected function configure()
    {
        $this->addOption('day', 'd', InputOption::VALUE_REQUIRED, 'Day of the event', '1');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $day = $input->getOption('day');

        $puzzle = $this->getPuzzleClass($day);
        if (is_null($puzzle)) {
            $output->writeln(sprintf('<error>Class not found for day %s</error>', $day));
            return Command::FAILURE;
        }

        $file = $puzzle->readFile();
        $exec1 = $puzzle->executeFirstPuzzle($file);
        $puzzle->writeResult($exec1);

        $exec2 = $puzzle->executeSecondPuzzle($file);
        $puzzle->writeResult($exec2);

        return Command::SUCCESS;
    }

    private function getPuzzleClass(string $day) {
        $class = sprintf('\App\Game\Day%s\Game', $day);
        if (!class_exists($class)) {
            return null;
        }

        return new $class();
    }
}