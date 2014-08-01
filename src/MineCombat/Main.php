<?php

namespace MineCombat;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener{

	public function onLoad(){
		$this->getLogger()->info(TextFormat::WHITE . "MineCombat 로딩 완료.");
	}

	public function onEnable(){
		$this->getLogger()->info(TextFormat::DARK_GREEN . "MineCombat 활성화 완료");
    }


	public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		switch($command->getName()){
			case "mc":
				$sender->sendMessage("Hello World!");
				return true;
			default:
				return false;
		}
	}

}