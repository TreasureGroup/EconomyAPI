<?php

namespace economyapi;

use economyapi\loader\Loader;
use economyapi\provider\Provider;
use economyapi\provider\Provider as ProviderAlias;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\SingletonTrait;

final class EconomyAPI extends PluginBase
{
    use SingletonTrait;

    /**
     * @return void
     */
    protected function onEnable(): void
    {
        $this->getLogger()->notice("This plugin is now available!");

        $this->saveResource("economy.json");

        (new Loader())->load();
    }

    /**
     * @return void
     */
    protected function onLoad(): void
    {
        self::setInstance($this);
    }

    /**
     * @return void
     */
    protected function onDisable(): void
    {
        $this->getLogger()->notice("This plugin is now unavailable!");
    }

    /**
     * @return ProviderAlias
     */
    public function getProvider() : ProviderAlias
    {
        return new Provider();
    }

}