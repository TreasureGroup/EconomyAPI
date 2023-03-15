<?php

namespace economyapi\provider;

use economyapi\EconomyAPI;
use JsonException;
use pocketmine\utils\Config;

class Provider
{
    /**
     * @param string $name
     * @return int
     */
    public function getMoney(string $name) : int
    {
        $name = strtolower($name);

        return $this->getProvider()->get($name);
    }

    /**
     * @param string $name
     * @param int $amount
     * @return void
     * @throws JsonException
     */
    public function setMoney(string $name, int $amount) : void
    {
        $name = strtolower($name);
        $provider = $this->getProvider();

        $provider->set($name, $amount);
        $provider->save();
    }

    /**
     * @param string $name
     * @param int $amount
     * @return void
     * @throws JsonException
     */
    public function addMoney(string $name, int $amount) : void
    {
        $name = strtolower($name);
        $provider = $this->getProvider();

        $provider->set($name, $this->getMoney($name) + $amount);
        $provider->save();
    }

    /**
     * @param string $name
     * @param int $amount
     * @return void
     * @throws JsonException
     */
    public function removeMoney(string $name, int $amount) : void
    {
        $name = strtolower($name);
        $provider = $this->getProvider();

        $provider->set($name, $this->getMoney($name) - $amount);
        $provider->save();
    }

    /**
     * @return Config
     */
    public function getProvider() : Config
    {
        return new Config(EconomyAPI::getInstance()->getDataFolder() . "economy.json", Config::JSON);
    }

}
