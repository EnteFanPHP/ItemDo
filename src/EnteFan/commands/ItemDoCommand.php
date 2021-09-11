<?php

namespace EnteFan\commands;

use EnteFan\ItemDo;
use EnteFan\ItemDoManager;
use EnteFan\constructor\ItemConstructor;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class ItemDoCommand extends Command{
  
  /**@var ItemDo*/
  private $plugin;
  
  /**@var ItemDoManager*/
  private $manager;
  
  public function __construct(ItemDo $plugin){
    parent::__construct("itemdo", "§aLet an item do anything");
    $this->plugin = $plugin;
  }
  
  public function execute(CommandSender $sender, string $string, array $args){
    if(empty($args[0]))return $sender->sendMessage("You must write an command");
    
    $command = $args[0];
    $permission = "NO_PERM";
    if(isset($args[1])){
      $permission = $args[1];
    }

    if(ItemDoManager::getHandItem($sender) !== null){
      new ItemConstructor($sender, ItemDoManager::getHandItem($sender), $command, $permission);
    }
  }
  
}
