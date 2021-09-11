<?php

namespace EnteFan\events;

use EnteFan\ItemDo;
use EnteFan\ItemDoManager;
use EnteFan\constructor\ItemConstructor;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\Listener;
use pocketmine\Server;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\permission\Permission;
use pocketmine\Player;

class InteractEvent implements Listener{
  
  /**@var ItemDo*/
  private $plugin;
  
  public function __construct(ItemDo $plugin){
    $this->plugin = $plugin;
  }
  
  public function onInteract(PlayerInteractEvent $event){
    $player = $event->getPlayer();
    $item = $event->getItem();
    if(ItemDoManager::isItemDoItem($item)){
      $rawcommand = ItemDoManager::getCommand($item);
      $rawpermission = ItemDoManager::getPermission($item);
      
      $command = $rawcommand->getValue();
      $permission = $rawpermission->getValue();
      
      $server = Server::getInstance();
      if($permission instanceof Permission){
        if($player->hasPermission($permission)){
          ItemDoManager::runCommand($player, $command);
        } else {
          $player->sendMessage("You have no permission");
        }
      } else {
        ItemDoManager::runCommand($player, $command);
      }
    }
  }
  
}
