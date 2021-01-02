<?php

namespace _64FF00\PureChat\factions;

use pocketmine\Player;

use BlockHorizons\FactionsPE\FactionsPE as FPE;
use BlockHorizons\FactionsPE\engine\ChatEngine;
use BlockHorizons\FactionsPE\manager\Members;

class FactionsPE implements FactionsInterface
{
    /*
        PureChat by 64FF00 (Twitter: @64FF00)

          888  888    .d8888b.      d8888  8888888888 8888888888 .d8888b.   .d8888b.
          888  888   d88P  Y88b    d8P888  888        888       d88P  Y88b d88P  Y88b
        888888888888 888          d8P 888  888        888       888    888 888    888
          888  888   888d888b.   d8P  888  8888888    8888888   888    888 888    888
          888  888   888P "Y88b d88   888  888        888       888    888 888    888
        888888888888 888    888 8888888888 888        888       888    888 888    888
          888  888   Y88b  d88P       888  888        888       Y88b  d88P Y88b  d88P
          888  888    "Y8888P"        888  888        888        "Y8888P"   "Y8888P"
    */

    /**
     * @return FPE|null
     */
    public function getAPI() {
    	return FPE::get();
    }

    public function hasFaction(Player $player) : bool {
    	return Members::get($player)->hasFaction();
    }

    /**
     * @return Faction|null
     */
    public function getPlayerFaction(Player $player) {
    	$member = Members::get($player);
    	if($member->hasFaction()) {
    		return $member->getFaction()->getName();
    	}
    	return null;
    }

    /**
     * @return string
     */
    public function getPlayerRank(Player $player) {
    	return ChatEngine::getBadge(Members::get($player)->getRole());
    }

}