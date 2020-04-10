<?php

namespace App\Command;

use App\Service\TxService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TxCheckCommand extends Command
{
    protected static $defaultName = 'tx:check';
    private $txService;

    public function __construct(TxService $txService)
    {
        $this->txService = $txService;

        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription('Check new tx');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->txService->checkTx();

        return 0;
    }
}
