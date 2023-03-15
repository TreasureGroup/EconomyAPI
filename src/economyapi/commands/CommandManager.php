<?php

namespace economyapi\commands;

use economyapi\commands\list\AddMoneyCommand;
use economyapi\commands\list\MyMoneyCommand;
use economyapi\commands\list\RemoveMoneyCommand;
use economyapi\commands\list\SeeMoneyCommand;
use economyapi\loader\LoaderManager;
use pocketmine\Server;

class CommandManager implements LoaderManager
{
    /**
     * @return void
     */
    public function onInit(): void
    {
        $commands = [new MyMoneyCommand(), new SeeMoneyCommand(), new AddMoneyCommand(), new RemoveMoneyCommand()];

        foreach ($commands as $command){

            Server::getInstance()->getCommandMap()->register("", $command);

        }

    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return "Command";
    }

}

