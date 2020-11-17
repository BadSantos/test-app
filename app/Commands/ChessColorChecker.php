<?php

namespace App\Commands;

use App\Components\ChessPoint;
use App\Exceptions\WrongPointCoordinates;
use App\Interfaces\ChessInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ChessCommand.
 */
class ChessColorChecker extends Command
{
    private $chess;

    public function __construct(ChessInterface $chess)
    {
        $this->chess = $chess;

        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('app:chess-color-checker')
            ->setDescription('Some operations with chess')
            ->setHelp('This command allows to check points color')
            ->addArgument('point1', InputArgument::REQUIRED, 'Point coordinates `c2`')
            ->addArgument('point2', InputArgument::REQUIRED, 'Point coordinates `e4`');
    }

    //https://symfony.ru/doc/current/console.html#console-testing-commands-ru
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $pointInput1 = $input->getArgument('point1');
        $pointInput2 = $input->getArgument('point2');

        try {
            $this->validatePointInput($pointInput1);
            $this->validatePointInput($pointInput2);

            $point1 = new ChessPoint($pointInput1[0], $pointInput1[1]);
            $point2 = new ChessPoint($pointInput2[0], $pointInput2[1]);
        } catch (WrongPointCoordinates $exception) {
            $output->writeln('<error>' . $exception->getMessage() . '</error>');

            return Command::FAILURE;
        }

        if ($this->chess->isSameColor($point1, $point2)) {
            $output->writeln('<info>Point colors are same</info>');
        } else {
            $output->writeln('<info>Point colors are </info><comment>NOT same</comment>');
        }

        return Command::SUCCESS;
    }

    /**
     * @param $pointInput
     *
     * @throws WrongPointCoordinates
     */
    protected function validatePointInput($pointInput): void
    {
        if (mb_strlen($pointInput) < 2) {
            throw new WrongPointCoordinates();
        }
    }
}
