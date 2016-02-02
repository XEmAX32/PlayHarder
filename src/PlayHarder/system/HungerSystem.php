<?php

namespace PlayHarder\system;

use pocketmine\item\Item;
use pocketmine\Player;
use PlayHarder\attribute\AttributeProvider;

class HungerSystem {
	const WALKING_AND_SNEAKING = 0.0025;
	const SWIMMING = 0.0075;
	const BREAKING_A_BLOCK = 0.0125;
	const SPRINTING = 0.005;
	const JUMPING = 0.005;
	const ATTACKING_AN_ENEMY = 0.005;
	const RECEIVING_ANY_DAMAGE = 0.005;
	const JUMPING_WHILE_SPRINTING = 0.005;
	
	public static function exhaustion(Player $player, $point) {
		$attribute = AttributeProvider::getInstance ()->getAttribute ( $player );
		$attribute->setHunger ( $attribute->getHunger () - $point );
		$attribute->updateAttribute ();
	}
	public static function saturation(Player $player, $itemId) {
		switch ($itemId) {
			case Item::GOLDEN_APPLE :
				$point = 8;
				break;
			default :
				$point = 0;
				break;
			// Reference http://minecraft.gamepedia.com/Hunger
		}
		
		$attribute = AttributeProvider::getInstance ()->getAttribute ( $player );
		$attribute->setHunger ( $attribute->getHunger () + $point );
		$attribute->updateAttribute ();
	}
}

?>
