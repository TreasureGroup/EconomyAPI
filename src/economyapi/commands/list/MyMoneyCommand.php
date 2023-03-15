<?php

namespace economyapi\commands\list;

use economyapi\EconomyAPI;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

final class MyMoneyCommand extends Command
{
    public function __construct()
    {
        parent::__construct("mymoney", "See how much money I have","/mymoney", [""]);
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

        $sender->sendMessage("You have $" . EconomyAPI::getInstance()->getProvider()->getMoney($sender->getName()) ." in your bank!");
    }

}