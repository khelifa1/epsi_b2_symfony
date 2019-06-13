<?php

namespace App\Entity;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Type
{
	const TYPE_FIRE = 1;
	const TYPE_PLANT = 2;
	const TYPE_WATER = 3;
	const TYPE_NORMAL = 4;

	public function getType($type)
	{
		switch ($type) 
		{
			case self::TYPE_FIRE:
			    return "Feu";
				break;
			case self::TYPE_WATER:
				return "Eau";
				break;
			case self::TYPE_PLANT:
				return "Plante";
				break;
			case self::TYPE_NORMAL:
			    return "Normal";
			    break;
			default:
				return false;
				break;
		}
	}

	public function IsTypeWeak($type, $type_atk)
	{
		if($type === self::TYPE_WATER){

			return (self::TYPE_FIRE ===$type_atk) ? true : false;
		}
		
		elseif($type === self::TYPE_FIRE){

			return(self::TYPE_PLANT ===$type_atk) ? true : false;
		}

		elseif ($type === self::TYPE_PLANT) {

			return(self::TYPE_FIRE ===$type_atk) ? true : false;
		}

		else

			return false;		
		
	}

	public function IsTypeStrong($type, $type_atk)
	{
		switch ($type)
		{
			case TYPE_FIRE:

				return ($type_atk === TYPE_PLANT) ? true : false;
				break;
			case TYPE_WATER:

				return ($type_atk === TYPE_FIRE) ? true : false; 
				break;
			case TYPE_PLANT:

				return ($type_atk === TYPE_WATER) ? true : false;
				break;
			default:

				return false;
				break;
		
		}
	}

}	



