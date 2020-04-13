<?php

namespace JumpPadz;

use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\entity\Effect;
use pocketmine\plugin\PluginBase;
use pocketmine\level\Level;
use pocketmine\level\Position;
use pocketmine\block\Block;
use pocketmine\math\Vector3;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\Server;

class Main extends PluginBase implements Listener{

        public function onEnable(){

                $this->getServer()->getPluginManager()->registerEvents($this, $this);
                $this->getLogger()->info("JumpPadz wurde erfolgreich gestartet!");
        }

        public function onDisable(){

                $this->getLogger()->info("JumpPadz wurde erfolgreich beendet!");
        }

        public function onMove(PlayerMoveEvent $event){

                $player = $event->getPlayer();
                $y = $player->getY();
                $block = $event->getPlayer()->getLevel()->getBlock($event->getPlayer()->floor()->subtract(0, 1));
                if($player->getLevel()->getName() == "jumppadz"){

                        if(block instanceof Block){
                                
                                $id = $block->getId();
                                $meta = $block->getDamage();

                                if($id == 19){

                                        $jumpHeight = 30;
                                        $height = ($jumpHeight - $y) / 10;
                                        $player->setMotion(new Vector3(0, 1, 0));
                                }
                        }
                }
        }
}
