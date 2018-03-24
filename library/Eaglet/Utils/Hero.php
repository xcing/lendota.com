<?php

class Eaglet_Utils_Hero
{
	private static $hero_array = array(
			'kunkka' => 1,
			'beastmaster' => 2,
		    'centaur warchief' => 3,
		    'earthshaker' => 4,
		    'omniknight' => 5,
	        'brewmaster' => 6,
	        'sven' => 7,
        	'tiny' => 8,
        	'tauren chieftain' => 9,
        	'treant protector' => 10,
			'treant' => 10,
        	'wisp' => 11,
        	'alchemist' => 12,
        	'clockwerk goblin' => 13,
			'clockwerk' => 13,
        	'dragon knight' => 14,
        	'huskar' => 15,
        	'bristleback' => 16,
        	'phoenix' => 17,
        	'tuskarr' => 18,
        	'anti mage' => 19,
        	'sniper' => 20,
       		'juggernaut' => 21,
       		'lone druid' => 22,
       		'luna' => 23,
        	'morphling' => 24,
       		'naga' => 25,
       		'naga siren' => 25,
       		'phantom lancer' => 26,
       		'lancer' => 26,
        	'mirana' => 27,
       		'riki' => 28,
       		'troll warlord' => 29,
       		'gyro' => 30,
        	'drow ranger' => 31,
       		'lanaya' => 32,
       		'templar assassin' => 32,
       		'ursa' => 33,
        	'vengeful spirit' => 34,
       		'bounty hunter' => 35,
       		'crystal maiden' => 36,
       		'enchantress' => 37,
        	'puck' => 38,
        	'chen' => 39,
        	'kotl' => 40,
        	'zeus' => 41,
        	'natures prophet' => 42,
        	'silencer' => 43,
        	'lina' => 44,
        	'storm spirit' => 45,
        	'windrunner' => 46,
        	'disruptor' => 47,
        	'ogre' => 48,
        	'goblin techies' => 49,
        	'jakiro' => 50,
        	'tinker' => 51,
        	'shadow shaman' => 52,
        	'rubick' => 53,
        	'axe' => 54,
        	'chaos' => 55,
			'chaos knight' => 55,
        	'doom bringer' => 56,
        	'lifestealer' => 57,
        	'lord of avernus' => 58,
        	'lycanthrope' => 59,
        	'night stalker' => 60,
        	'pit lord' => 61,
        	'pudge' => 62,
        	'skeleton king' => 63,
        	'slardar' => 64,
        	'undying' => 65,
        	'tidehunter' => 66,
        	'magnataur' => 67,
			'magnus' => 67,
        	'spiritbreaker' => 68,
        	'spirit breaker' => 68,
        	'sandking' => 69,
        	'bloodseeker' => 70,
        	'clinkz' => 71,
        	'broodmother' => 72,
        	'nyx' => 73,
        	'weaver' => 74,
        	'mortred' => 75,
        	'shadow fiend' => 76,
        	'soul keeper' => 77,
        	'spectre' => 78,
        	'venomancer' => 79,
        	'viper' => 80,
        	'meepo' => 81,
        	'razor' => 82,
        	'razer' => 82,
        	'slark' => 83,
        	'faceless void' => 84,
        	'medusa' => 85,
        	'bane' => 86,
        	'dark seer' => 87,
        	'death prophet' => 88,
        	'lion' => 89,
        	'enigma' => 90,
        	'lich' => 91,
        	'necrolyte' => 92,
        	'pugna' => 93,
        	'outworld destroyer' => 94,
        	'destroyer' => 94,
        	'queen of pain' => 95,
        	'warlock' => 96,
        	'shadow demon' => 97,
        	'batrider' => 98,
        	'dazzle' => 99,
        	'invoker' => 100,
        	'visage' => 101,
        	'leshrac' => 102,
        	'witch doctor' => 103,
        	'ancient apparition' => 104,
        	'legion commander' => 105,
        	'goblin shredder' => 106,
        	'ember spirit' => 107,
        	'skywrath mage' => 108
	);
	private static $hero_dotabuff_array = array(
			'Kunkka' => 1,
    		'Beastmaster' => 2,
    		'Centaur Warchief' => 3,
    		'Earthshaker' => 4,
    		'Omniknight' => 5,
    		'Brewmaster' => 6,
    		'Sven' => 7,
    		'Tiny' => 8,
    		'Tauren Chieftain' => 9,
    		'Treant Protector' => 10,
    		'Wisp' => 11,
    		'Alchemist' => 12,
    		'Clockwerk' => 13,
    		'Dragon Knight' => 14,
    		'Huskar' => 15,
    		'Bristleback' => 16,
    		'Phoenix' => 17,
    		'Tuskarr' => 18,
    		'Anti-Mage' => 19,
    		'Sniper' => 20,
    		'Juggernaut' => 21,
    		'Lone Druid' => 22,
    		'Luna' => 23,
    		'Morphling' => 24,
    		'Naga Siren' => 25,
    		'Phantom Lancer' => 26,
    		'Mirana' => 27,
    		'Riki' => 28,
    		'Troll Warlord' => 29,
    		'gyrocopter' => 30,
    		'Drow Ranger' => 31,
    		'Templar Assassin' => 32,
    		'Ursa' => 33,
    		'Vengeful Spirit' => 34,
    		'Bounty Hunter' => 35,
    		'Crystal Maiden' => 36,
    		'Enchantress' => 37,
    		'Puck' => 38,
    		'Chen' => 39,
    		'Keeper of the Light' => 40,
    		'Zeus' => 41,
    		'Nature&#x27;s Prophet' => 42,
    		'Silencer' => 43,
    		'Lina' => 44,
    		'Storm Spirit' => 45,
    		'Windrunner' => 46,
    		'Disruptor' => 47,
    		'Ogre Magi' => 48,
    		'Goblin Techies' => 49,
    		'Jakiro' => 50,
    		'Tinker' => 51,
    		'Shadow Shaman' => 52,
    		'Rubick' => 53,
    		'Axe' => 54,
    		'Chaos Knight' => 55,
    		'Doom Bringer' => 56,
    		'Lifestealer' => 57,
    		'Lord of Avernus' => 58,
    		'Lycanthrope' => 59,
    		'Night Stalker' => 60,
    		'Pit Lord' => 61,
    		'Pudge' => 62,
    		'Skeleton King' => 63,
    		'Slardar' => 64,
    		'Undying' => 65,
    		'Tidehunter' => 66,
    		'Magnataur' => 67,
    		'Spirit Breaker' => 68,
    		'Sand King' => 69,
    		'Bloodseeker' => 70,
    		'Clinkz' => 71,
    		'Broodmother' => 72,
    		'Nyx Assasin' => 73,
    		'Weaver' => 74,
    		'Phantom Assasin' => 75,
    		'Shadow Fiend' => 76,
    		'Soul Keeper' => 77,
    		'Spectre' => 78,
    		'Venomancer' => 79,
    		'Viper' => 80,
    		'Meepo' => 81,
    		'Razor' => 82,
    		'Slark' => 83,
    		'Faceless Void' => 84,
    		'Medusa' => 85,
    		'Bane' => 86,
    		'Dark Seer' => 87,
    		'Death Prophet' => 88,
    		'Lion' => 89,
    		'Enigma' => 90,
    		'Lich' => 91,
    		'Necrolyte' => 92,
    		'Pugna' => 93,
    		'Outworld Destroyer' => 94,
    		'Queen of Pain' => 95,
    		'Warlock' => 96,
    		'Shadow Demon' => 97,
    		'Batrider' => 98,
    		'Dazzle' => 99,
    		'Invoker' => 100,
    		'Visage' => 101,
    		'Leshrac' => 102,
    		'Witch Doctor' => 103,
    		'Ancient Apparition' => 104,
    		'Legion Commander' => 105,
    		'Goblin Shredder' => 106,
    		'Ember Spirit' => 107,
    		'Skywrath Mage' => 108
	);
	
    public static function getHeroId($heroName)
    {
		return self::$hero_array[$heroName];
    }
    public static function getHeroId_dotabuff($heroName)
    {
    	return self::$hero_dotabuff_array[$heroName];
    }
}