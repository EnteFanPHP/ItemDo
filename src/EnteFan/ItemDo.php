<?php

declare(strict_types=1);

namespace EnteFan;

use EnteFan\commands\ItemDoCommand;
use EnteFan\events\InteractEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;

class ItemDo extends PluginBase{

  public function onEnable(){
    $this->registerCommands();
    $this->registerEvents();
  }
  
  public function registerCommands(){
    $server = Server::getInstance();
    $server->getCommandMap()->register("itemdo", new ItemDoCommand($this));
  }
  
  public function registerEvents(){
    $server = Server::getInstance();
    $server->getPluginManager()->registerEvents(new InteractEvent($this), $this);
  }  
  
}
