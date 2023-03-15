<?php

namespace economyapi\listeners;

use economyapi\EconomyAPI;
use economyapi\listeners\list\EconomyListener;
use economyapi\loader\LoaderManager;
use pocketmine\Server;

class ListenerManager implements LoaderManager
{
    /**
     * @return void
     */
    public function onInit(): void
    {
        Server::getInstance()->getPluginManager()->registerEvents(new EconomyListener(EconomyAPI::getInstance()), EconomyAPI::getInstance());
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return "Listener";
    }

}
