<?php

namespace MineCombat;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent as PJE;
use pocketmine\scheduler\CallbackTask;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener{

private $debug = true;
private $point[];
	public function onLoad(){
		$this->getLogger()->info(TextFormat::WHITE . "MineCombat 로딩 완료.");
	}

	public function log($text, $level = 2){

		switch($level){
			case 0: //디버깅
				$this->getLogger()->info(TextFormat::YELLOW.$text);
				break;
			case 1: //오류
				$this->getLogger()->info(TextFormat::RED.$text);
				break;
			case 2: //일반 로그
				$this->getLogger()->info(TextFormat::WHITE . $text);
				break;
			
		}
	}
	
	public function onEnable(){
		$this->getLogger()->info(TextFormat::DARK_GREEN . "MineCombat 활성화 완료");
		$this->log("테스트 로그: 디버깅", 0);
		$this->log("테스트 로그: 오류", 1);
		$this->log("테스트 로그: 일반");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);	
		$this->log("MineCombat 이벤트 함수 등록 성공.", 1);
    }
	
	public function onPlayerJoin(PJE $ev){
		$ev->setJoinMessage("어서와 처음이지?");
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