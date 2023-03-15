<?php

namespace economyapi\listeners\list;

use economyapi\EconomyAPI;
use JsonException;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

class EconomyListener implements Listener
{
    /**
     * @param PlayerJoinEvent $event
     * @return void
     * @throws JsonException
     */
    public function onPlayerJoinEvent(PlayerJoinEvent $event) : void
    {
        $provider = EconomyAPI::getInstance()->getProvider();
        $player = $event->getPlayer();

        if (!$provider->getProvider()->exists(strtolower($player->getName()))){

            $provider->setMoney($player->getName(), 0);
            EconomyAPI::getInstance()->getLogger()->notice("{$player->getName()} has just been registered.");

        }

    }

}
