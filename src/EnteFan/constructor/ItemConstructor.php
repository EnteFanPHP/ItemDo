<?php

namespace EnteFan\constructor;

use EnteFan\events\custom\ItemCreationEvent;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\nbt\tag\StringTag;

class ItemConstructor{
  
  /**@var Player*/
  private Player $player;
  
  /**@var Item*/
  private Item $item;
  
  /**@var int*/
  private int $itemId;
  
  /**@var string*/
  private string $command;
  
  /**@var ?*/
  private $permisson;
  
  public function __construct(Player $player, Item $item, string $command, $permisson){
    $this->player = $player;
    $this->item = $item;
    $this->itemId = $item->getId();
    $this->command = $command;
    $this->permission = $permisson;
    
    $this->build();
    
    $event = new ItemCreationEvent($player, $item);
    $event->call();
  }
  
  public function build(){
    $this->player->getInventory()->removeItem(Item::get($this->itemId, 0, 1));
    
    $item = new Item($this->itemId, 0, 1);
    
    $item->setNamedTagEntry(new StringTag("itemdo", "ItemDo by EnteFan"));
    $item->setNamedTagEntry(new StringTag("command", $this->command));
    $item->setNamedTagEntry(new StringTag("permission", $this->permission));
    
    $item->setLore(["§aItemdo item"]);
    $this->player->getInventory()->addItem($item);
  }
  
}
