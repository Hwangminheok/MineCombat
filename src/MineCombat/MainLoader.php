<?php

namespace MainLoader;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class MainLoader extends PluginBase implements Listener{

	public function onLoad(){
		$this->getLogger()->info(TextFormat::WHITE . "MineCombat 로딩 완료.");
	}

	public function onEnable(){
		$this->getLogger()->info(TextFormat::DARK_GREEN . "MineCombat 활성화 완료");
		$this->getServer()->getPluginManager()->registerInterface("MineCombat\\MainClass");
		$this->getServer()->getPluginManager()->loadPlugins($this->getServer()->getPluginPath(), array("MineCombat\\MainClass", "MineCombat\\AntiSpam"));
		$this->getServer()->enablePlugins(PluginLoadOrder::STARTUP);
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