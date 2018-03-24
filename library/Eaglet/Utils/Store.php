<?php

class Eaglet_Utils_Store
{
	private static $dollar = 32;
	private static $sell = 35;
	private static $truemoney = 45;
	
	private static $rarity_array = array(
			'Common',
			'Uncommon',
			'Rare',
		    'Mythical',
		    'Legendary',
		    'Arcana'
	);
	private static $rarity_color = array(
			'B0C3D9',
			'5E98D9',
			'4B69FF',
			'8847FF',
			'D32CE6',
			'ADE55C'	
	);
	private static $rarity_class = array(
			'boxCommon',
			'boxUncommon',
			'boxRare',
			'boxMythical',
			'boxLegendary',
			'boxArcana'
	);
	
	private static $slot_array = array(
			'N/A',
			'Weapon',
			'Back',
			'Shoulder',
			'Head',
			'Neck',
			'Belt',
			'Armor',
			'Arm',
			'Arms',
			'Ability 3',
			'Gloves',
			'Off-Hand',
			'Ability 2',
			'legs',
			'Body - Head',
			'Misc',
			'Ward',
			'Tail',
			'Summoned Unit',
			'Ultimate',
			'Mount'
	);
	
	private static $type_array = array(
			'bundles',
			'equipment',
			'tools',
			'courier',
			'announcers',
			'tournaments',
			'teams'
	);
	
	private static $status_array = array(
			'0',
			'ยังไม่ยืนยัน',
			'ยังไม่ชำระเงิน',
			'ชำระเงินแล้ว รอการส่งมอบสินค้า',
			'ส่งมอบสินค้าเรียบร้อย'		
	);
	private static $status_color = array(
			'FFFFFF',
			'FFFFFF',
			'CD5C5C',
			'32CD32',
			'6C7075'
	);
	private static $bank_array = array(
			'',
			'kbank',
			'tmb'
	);
		
	public static function calculateProfit($total){
		return ceil($total - ($total/self::$sell)*self::$dollar);
	}
	public static function getPrice($dollar)
	{
		return ceil($dollar*self::$sell);
	}
	public static function getPriceTruemoney($dollar)
	{
		return ceil($dollar*self::$truemoney);
	}
	public static function calculateSale($price, $priceSale)
	{
		return '-'.round(100-($priceSale/$price*100)).'%';
	}
	
    public static function getRarityName($rarityId)
    {
    	$text = '<span style="color:#'.self::$rarity_color[$rarityId].'">'.self::$rarity_array[$rarityId].'</span>';
		return $text;
    }
    public static function getRarityClass($rarityId)
    {
    	return self::$rarity_class[$rarityId];
    }
    public static function getSlotName($slotId)
    {
    	return self::$slot_array[$slotId];
    }
    public static function getTypeName($typeId)
    {
    	return self::$type_array[$typeId];
    }
    public static function getSlot()
    {
    	return self::$slot_array;
    }
    public static function getStatus($statusId)
    {
    	$text = '<span style="color:#'.self::$status_color[$statusId].'">'.self::$status_array[$statusId].'</span>';
    	return $text;
    }
    public static function getStatusColor($statusId)
    {
    	return self::$status_color[$statusId];;
    }
	public static function getBankName($bankId)
    {
    	return self::$bank_array[$bankId];
    }
}