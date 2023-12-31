<?php

use Behavioral\Command\CLIInvoker;
use Behavioral\Command\DeployCommand;
use Behavioral\Command\GitReceiver;
use Behavioral\Command\RevertCommand;

class CommandTest extends \PHPUnit\Framework\TestCase
{
    private $invocker;

    public function testCanExceuteDeployCommand()
    {
        $receiver = new GitReceiver();
        $command = new DeployCommand($receiver);
        $this->invocker->setCommand($command);
        $this->invocker->run();

        self::assertCount(3, $receiver->getGitLog());

        self::assertEquals([
            'Git - Add',
            'Git - Commit',
            'Git - Push'
        ],
            $receiver->getGitLog());
    }

    public function testCanExecuteRevertCommand()
    {
        $receiver = new GitReceiver();
        $command = new DeployCommand($receiver);
        $this->invocker->setCommand($command);
        $this->invocker->run();

        $revertCommand = new RevertCommand($receiver);
        $this->invocker->setCommand($revertCommand);
        $this->invocker->run();

        self::assertCount(1, $receiver->getGitLog());

        self::assertEquals([
            'Git - Revert'
        ],
            $receiver->getGitLog());


    }

    protected function setUp(): void
    {
        $this->invocker = new CLIInvoker();

    }

}