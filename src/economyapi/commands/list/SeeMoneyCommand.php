<?php

namespace economyapi\commands\list;

use economyapi\EconomyAPI;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\Server;

final class SeeMoneyCommand extends Command
{
    public function __construct()
    {
        parent::__construct("seemoney", "See how much money a player has","/seemoney", [""]);
    }

    /**
     * @param CommandSender $sender
     * @param string $commandLabel
     * @param array $args
     * @return void
     */
    public function execute(CommandSender $sender, string $commandLabel, array $args) : void
    {
        if (!$sender instanceof Player) return;

        if (isset($args[0])){

            $target = Server::getInstance()->getPlayerByPrefix($args[0]);

            if (!$target instanceof Player) return;

            $sender->sendMessage("{$target->getName()} has $" . EconomyAPI::getInstance()->getProvider()->getMoney($sender->getName()) ." in his bank!");

        }

    }

}