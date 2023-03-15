<?php

namespace economyapi\loader;

use economyapi\commands\CommandManager;
use economyapi\EconomyAPI;
use economyapi\listeners\ListenerManager;

class Loader
{
    /**
     * @return void
     */
    public function load() : void
    {
        $managers = [new CommandManager(), new ListenerManager()];

        foreach ($managers as $loader){

            if (!$loader instanceof LoaderManager) continue;

            $loader->onInit();

            EconomyAPI::getInstance()->getLogger()->info("{$loader->getName()} load with success!");

        }

    }

}