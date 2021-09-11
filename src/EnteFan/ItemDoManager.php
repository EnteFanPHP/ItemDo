<?php

namespace EnteFan;

use pocketmine\item\Item;
use pocketmine\Player;

class ItemDoManager{
  
  public static function getHandItem(Player $player){
    $inventory = $player->getInventory();
    $item = $inventory->getItemInHand();
    return $item;
  }
  
  public static function getCommand(Item $item){
    $command = $item->getNamedTagEntry("command");
    return $command;
  }
  
  public static function getPermission(Item $item){
    $permission = $item->getNamedTagEntry("permission");
    return $permission;
  } 
  
  public static function runCommand(Player $player, $command){
    $toRun = str_replace("{player}", $player->getName(), $command);
    $player->chat("/".$toRun);
  }
  
  public static function isItemDoItem(Item $item):bool{
    if($item->getNamedTag()->hasTag("itemdo")){
      return true;
    }
    return false;
  }
  
}
