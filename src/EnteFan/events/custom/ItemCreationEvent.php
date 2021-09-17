<?php

namespace EnteFan\events\custom;

use pocketmine\event\Event;
use pocketmine\item\Item;
use pocketmine\Player;

class ItemCreationEvent extends Event{
  
  /**@var Player*/
  public $player;
  
  /**@var Item*/
  public $item;
  
  public function __construct(Player $player, Item $item){
    $this->player = $player;
    $this->item = $item;
  }
  
  public function getPlayer(){
    return $this->player;
  }
  
  public function getItem(){
    return $this->item;
  }
  
  
}
