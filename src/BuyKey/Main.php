<?php

namespace BuyKey;

# Edit Form BuyMoney By HituilaHuy
# Team CastleVN
# Facebook: facebook.com/huyyt0911
# Youtube: HituilaHuy Tv
# =====================
# IP: Castlevnpe.ddns.net
# Port: 19132

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\TextFormat as C;
use Buykey\Main;

class Main extends PluginBase implements Listener {
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->economyapi = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
		
		@mkdir($this->getDataFolder());
		$this->saveDefaultConfig();
		$this->getResource("config.yml");
	}

	public function onCommand(CommandSender $player, Command $command, string $label, array $args) : bool {
		switch($command->getName()){
			case "buykey":
			if($player instanceof Player){
			    $this->openMyForm($player);
			} else {
				$player->sendMessage("§cBạn chỉ được sử dụng lệnh trong game !");
					return true;
			}
			break;
		}
	    return true;
	}

	public function openMyForm(Player $sender){
		$formapi = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		$form = $formapi->createSimpleForm(function (Player $sender, ?int $data = null){
		$result = $data;
		if($result === null){
			return;
		    }
			switch($result){
				case 0;
			    $this->Common($sender);
					break;
				case 1;
				$this->Uncommon($sender);
					break;
				case 2;
				$this->Mythic($sender);
					break;
				case 3;
				$this->Legendary($sender);
					break;
			}
		});
		$money = $this->economyapi->myMoney($sender);
		$form->setTitle("§l§4• §cMua Key §4•");
				$form->setContent("§l§6+§b Xu của bạn: §f$money §bXu\n§6+§a Hãy chọn Gói bạn muốn mua !");
		$form->addButton("§l§6• §cKey Common §6•\n§aGiá: §f500,000 Xu", 0);
		$form->addButton("§l§6• §cKey Uncommon §6•\n§aGiá: §f1,000,000 Xu", 1);
		$form->addButton("§l§6• §cKey Mythic §6•\n§aGiá: §f5,000,000 Xu", 2);
	    $form->addButton("§l§6• §cKey Legendary §6•\n§aGiá: §f10,000,000 Xu", 3);
		$form->sendToPlayer($sender);
			return $form;
	}

/**
* Key Common:——————————————————————————————————————————
*/

	public function Common($sender){
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createModalForm(function (Player $sender, $data){
        $result = $data;
        if ($result == null) {
             }
             switch ($result) {
                 case 1:
                 $money = $this->economyapi->myMoney($sender);
                 $name = $sender->getName();
                 $package = $this->getConfig()->get("Common");
                 $cost = $this->getConfig()->get("GiaCommon");
                 if($money >= $cost){
            
                 $this->economyapi->reduceMoney($sender, $cost);	
                 $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "key Common 1 ".$name);
                 $this->getServer()->broadcastMessage("§l§6• §aNgười chơi §e".$name." §ađã mua thành công §d".$package);
		         $this->MuaThanhCong($sender);
              return true;
            }else{
                $this->MuaThatBai($sender);
            }
                        break;
                    case 2:
                        break;
            }
        });
        $package = $this->getConfig()->get("Common");
        $cost = $this->getConfig()->get("GiaCommon");
		$form->setTitle("§l§4• §cXác Nhận Mua ".$package." §4•");
        $form->setContent("§l§6• §aBạn có muốn mua §b".$package." §avới giá ".$cost." §cXu");
        $form->setButton1($this->getConfig()->get("ButtonDongY"), 1);
        $form->setButton2($this->getConfig()->get("ButtonTuChoi"), 2);
        $form->sendToPlayer($sender);
     }

/**
* Key Uncommon:————————————————————————————————————————
*/
	public function Uncommon($sender){
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createModalForm(function (Player $sender, $data){
        $result = $data;
        if ($result == null) {
             }
             switch ($result) {
                 case 1:
                 $money = $this->economyapi->myMoney($sender);
                 $name = $sender->getName();
                 $package = $this->getConfig()->get("Uncommon");
                 $cost = $this->getConfig()->get("GiaUncommon");
                 if($money >= $cost){
            
                 $this->economyapi->reduceMoney($sender, $cost);	
                 $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "key Uncommon 1 ".$name);
                 $this->getServer()->broadcastMessage("§l§6• §aNgười chơi §e".$name." §ađã mua thành công §d".$package);
		         $this->MuaThanhCong($sender);
              return true;
            }else{
                $this->MuaThatBai($sender);
            }
                        break;
                    case 2:
                        break;
            }
        });
        $package = $this->getConfig()->get("Uncommon");
        $cost = $this->getConfig()->get("GiaUncommon");
		$form->setTitle("§l§4• §cXác Nhận Mua ".$package." §4•");
        $form->setContent("§l§6• §aBạn có muốn mua §b".$package." §avới giá ".$cost." §cXu");
        $form->setButton1($this->getConfig()->get("ButtonDongY"), 1);
        $form->setButton2($this->getConfig()->get("ButtonTuChoi"), 2);
        $form->sendToPlayer($sender);
     }

/**
* Key Mythic:——————————————————————————————————————————
*/

	public function Mythic($sender){
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createModalForm(function (Player $sender, $data){
        $result = $data;
        if ($result == null) {
             }
             switch ($result) {
                 case 1:
                 $money = $this->economyapi->myMoney($sender);
                 $name = $sender->getName();
                 $package = $this->getConfig()->get("Mythic");
                 $cost = $this->getConfig()->get("GiaMythic");
                 if($money >= $cost){
            
                 $this-> economyapi->reduceMoney($sender, $cost);	
                 $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "key Mythic 1 ".$name);
                 $this->getServer()->broadcastMessage("§l§6• §aNgười chơi §e".$name." §ađã mua thành công §d".$package);
		         $this->MuaThanhCong($sender);
              return true;
            }else{
                $this->MuaThatBai($sender);
            }
                        break;
                    case 2:
                        break;
            }
        });
        $package = $this->getConfig()->get("Mythic");
        $cost = $this->getConfig()->get("GiaMythic");
		$form->setTitle("§l§4• §cXác Nhận Mua ".$package." §4•");
        $form->setContent("§l§6• §aBạn có muốn mua §b".$package." §avới giá ".$cost." §cXu");
        $form->setButton1($this->getConfig()->get("ButtonDongY"), 1);
        $form->setButton2($this->getConfig()->get("ButtonTuChoi"), 2);
        $form->sendToPlayer($sender);
     }

/**
* Key Legendary:———————————————————————————————————————
*/

	public function Legendary($sender){
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createModalForm(function (Player $sender, $data){
        $result = $data;
        if ($result == null) {
             }
             switch ($result) {
                 case 1:
                 $money = $this-> economyapi->myMoney($sender);
                 $name = $sender->getName();
                 $package = $this->getConfig()->get("Legendary");
                 $cost = $this->getConfig()->get("GiaLegendary");
                 if($money >= $cost){
            
                 $this->economyapi->reduceMoney($sender, $cost);	
                 $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "key Legendary 1 ".$name);
                 $this->getServer()->broadcastMessage("§l§6• §aNgười chơi §e".$name." §ađã mua thành công §d".$package);
		         $this->MuaThanhCong($sender);
              return true;
            }else{
                $this->MuaThatBai($sender);
            }
                        break;
                    case 2:
                        break;
            }
        });
        $package = $this->getConfig()->get("Legendary");
        $cost = $this->getConfig()->get("GiaLegendary");
		$form->setTitle("§l§4• §cXác Nhận Mua ".$package." §4•");
        $form->setContent("§l§6• §aBạn có muốn mua §b".$package." §avới giá ".$cost." §xXu");
        $form->setButton1($this->getConfig()->get("ButtonDongY"), 1);
        $form->setButton2($this->getConfig()->get("ButtonTuChoi"), 2);
        $form->sendToPlayer($sender);
     }

	public function MuaThanhCong($sender){
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		$form = $api->createSimpleForm(function (Player $sender, $data){
			$result = $data;
			if ($result == null) {
			}
			switch ($result) {
					case 1:
						break;
			}
		});
	$form->setTitle($this->getConfig()->get("MuaThanhCongTitle"));
	$form->setContent($this->getConfig()->get("MuaThanhCongContent"));
	$form->addButton($this->getConfig()->get("MuaThanhCongSubmit"));
	$form->sendToPlayer($sender);
	}

	public function translateMessage($scut, $message) {
	$message = str_replace($scut."{name}", $sender->getName(), $message);
		return $message;
     } 

	public function MuaThatBai($sender){
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		$form = $api->createSimpleForm(function (Player $sender, $data){
			$result = $data;
			if ($result == null) {
			}
			switch ($result) {
					case 1:
						break;
			}
		});
	$form->setTitle($this->getConfig()->get("MuaThatBaiTitle"));
	$form->setContent($this->getConfig()->get("MuaThatBaiContent"));
	$form->addButton($this->getConfig()->get("MuaThatBaiSubmit"));
	$form->sendToPlayer($sender);
	}
	public function processor(Player $player, string $string): string{		$string = str_replace("{name}", $player->getName(), $string);
	return $string;
	}
}
