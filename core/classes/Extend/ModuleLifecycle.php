<?php

namespace NamelessMC\Framework\Extend;
use Illuminate\Container\Container;

class ModuleLifecycle extends BaseExtender
{
    private array $onInstall = [];
    private array $onEnable = [];
    private array $onDisable = [];
    private array $onUninstall = [];

    public function extend(Container $container): void {
        $this->module->setOnInstall($this->onInstall);
        $this->module->setOnEnable($this->onEnable);
        $this->module->setOnDisable($this->onDisable);
        $this->module->setOnUninstall($this->onUninstall);
    }

    public function onInstall(string $hook): ModuleLifecycle {
        $this->onInstall[] = $hook;

        return $this;
    }

    public function onEnable(string $hook): ModuleLifecycle {
        $this->onEnable[] = $hook;

        return $this;
    }

    public function onDisable(string $hook): ModuleLifecycle {
        $this->onDisable[] = $hook;

        return $this;
    }

    public function onUninstall(string $hook): ModuleLifecycle {
        $this->onUninstall[] = $hook;

        return $this;
    }
}