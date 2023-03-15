<?php

namespace economyapi\commands\list;

use economyapi\EconomyAPI;
use JsonException;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\Server;

final class AddMoneyCommand extends Command
{
    public function __construct()
    {
        parent::__construct("addmoney", "Add money to a player","/addmoney", [""]);
    }

    /**
     * @param CommandSender $sender
     * @param string $commandLabel
     * @param array $args
     * @return void
     * @throws JsonException
     */
    public function execute(CommandSender $sender, string $commandLabel, array $args) : void
    {
        if (!$sender instanceof Player) return;

        if (!$sender->getServer()->isOp($sender->getName())) return;

        if (isset($args[0], $args[1])){

            $target = Server::getInstance()->getPlayerByPrefix($args[0]);

            if (!$target instanceof Player) return;

            if (!is_numeric($args[1])) return;

            EconomyAPI::getInstance()->getProvider()->addMoney($target->getName(), $args[1]);
            $sender->sendMessage("You added {$args[1]}$ to {$target->getName()} he now has " . EconomyAPI::getInstance()->getProvider()->getMoney($target->getName()) ."$ in his bank");

        }

    }

}