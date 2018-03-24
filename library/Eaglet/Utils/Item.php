<?php

class Eaglet_Utils_Item
{
	private static $item_array = array(
			'Assault Cuirass' => 1,
			'Heart of Tarrasque' => 2,
			'Black King Bar' => 3,
			'Aegis of the Immortal' => 4,
			'Shiva&#x27;s Guard' => 5,
			'Bloodstone' => 6,
			'Linken&#x27;s Sphere' => 7,
			'Vanguard' => 8,
			'Blade Mail' => 9,
			'Soul Booster' => 10,
			'Hood of Defiance' => 11,
			'Scythe of Vyse' => 12,
			'Orchid Malevolence' => 13,
			'Cyclone' => 14,
			'Force Staff' => 15,
			'Dagon' => 16,
			'Dagon 1' => 16,
			'Dagon 2' => 16,
			'Dagon 3' => 16,
			'Dagon 4' => 16,
			'Dagon 5' => 16,
			'Necronomicon' => 17,
			'Necronomicon 1' => 17,
			'Necronomicon 2' => 17,
			'Necronomicon 3' => 17,
			'Aghanim&#x27;s Scepter' => 18,
			'Refresher Orb' => 19,
			'Veil of Discord' => 20,
			'Mekansm' => 21,
			'Vladmir&#x27;s Offering' => 22,
			'Arcane Boots' => 23,
			'Flying Courier' => 24,
			'Buckler' => 25,
			'Ring of Basilius' => 26,
			'Pipe of Insight' => 27,
			'Urn of Shadows' => 28,
			'Headdress' => 29,
			'Medallion of Courage' => 30,
			'Drum of Endurance' => 31,
			'Rapier' => 32,
			'Monkey King Bar' => 33,
			'Radiance' => 34,
			'The Butterfly' => 35,
			'Daedalus' => 36,
			'Skull Basher' => 37,
			'Battlefury' => 38,
			'Manta Style' => 39,
			'Crystalys' => 40,
			'Armlet of Mordiggian' => 41,
			'Shadow Blade' => 42,
			'Ethereal Blade' => 43,
			'Sange and Yasha' => 44,
			'Satanic' => 45,
			'Mjollnir' => 46,
			'Eye of Skadi' => 47,
			'Sange' => 48,
			'Helm of the Dominator' => 49,
			'Maelstrom' => 50,
			'Desolator' => 51,
			'Yasha' => 52,
			'Mask of Madness' => 53,
			'Diffusal Blade' => 54,
			'Diffusal Blade 1' => 54,
			'Diffusal Blade 2' => 54,
			'Boots of Travel' => 55,
			'Phase Boots' => 56,
			'Power Treads' => 57,
			'Soul Ring' => 58,
			'Hand of Midas' => 59,
			'Oblivion Staff' => 60,
			'Perserverance' => 61,
			'Poor Man&#x27;s Shield' => 62,
			'Bracer' => 63,
			'Wraith Band' => 64,
			'Null Talisman' => 65,
			'Magic Wand' => 66,
			'Gloves of Haste' => 67,
			'Morbid Mask' => 68,
			'Ring of Regeneration' => 69,
			'Blink Dagger' => 70,
			'Sobi Mask' => 71,
			'Boots of Speed' => 72,
			'Gem of Truesight' => 73,
			'Cloak' => 74,
			'Magic Stick' => 75,
			'Talisman of Evasion' => 76,
			'Ghost Scepter' => 77,
			'Clarity Position' => 78,
			'Healing Salve' => 79,
			'Tango' => 80,
			'Bottle' => 81,
			'Observer Ward' => 82,
			'Sentry Ward' => 83,
			'Dust of Appearance' => 84,
			'Animal Courier' => 85,
			'Town Portal Scroll' => 86,
			'Smoke of Deceit' => 87,
			'Gauntlets of Strength' => 88,
			'Slippers of Agility' => 89,
			'Mantle of Intelligence' => 90,
			'Iron Branch' => 91,
			'Belt of Giant Strength' => 92,
			'Boots of Elvenskin' => 93,
			'Robe of the Magi' => 94,
			'Circlet' => 95,
			'Ogre Axe' => 96,
			'Blade of Alacrity' => 97,
			'Staff of Wizardry' => 98,
			'Ultimate Orb' => 99,
			'Blades of Attack' => 100,
			'Broadsword' => 101,
			'Quarterstaff' => 102,
			'Claymore' => 103,
			'Ring of Protection' => 104,
			'Stout Shield' => 105,
			'Javelin' => 106,
			'Mithril Hammer' => 107,
			'Chainmail' => 108,
			'Helm of Iron Will' => 109,
			'Platemail' => 110,
			'Quelling Blade' => 111,
			'Demon Edge' => 112,
			'Eaglesong' => 113,
			'Reaver' => 114,
			'Sacred Relic' => 115,
			'Hyperstone' => 116,
			'Ring of Health' => 117,
			'Void Stone' => 118,
			'Mystic Staff' => 119,
			'Energy Booster' => 120,
			'Point Booster' => 121,
			'Vitality Booster' => 122,
			'Orb of Venom' => 123,
			'Rod of Atos' => 124,
			'Ring of Aquila' => 125,
			'Tranquil Boots' => 126,
			'Abyssal Blade' => 127,
			'Heaven&#x27;s Halberd' => 128
	);
	
    public static function getItemId($itemName)
    {
    	return self::$item_array[$itemName];
    }
}