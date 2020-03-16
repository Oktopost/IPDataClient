<?php
namespace IPDataClient\Data;


use Gazelle\IResponse;
use Objection\LiteSetup;
use Objection\LiteObject;


/**
 * @property string 		$IP
 * @property string|null	$City
 * @property string|null	$Region
 * @property string|null	$RegionCode
 * @property string|null	$CountryName
 * @property string|null	$CountryCode
 * @property string|null	$ContinentName
 * @property string|null	$ContinentCode
 * @property double|null	$Latitude
 * @property double|null	$Longitude
 * @property string			$Postal
 * 
 * @property string|null	$Flag
 * @property string|null	$EmojiFlag
 * @property string|null	$EmojiUnicode
 * 
 * @property array 			$OriginalData
 * @property IResponse		$OriginalResponse
 * @property int			$RequestsCount
 */
class IPDataResponse extends LiteObject
{
	/**
	 * @return array
	 */
	protected function _setup()
	{
		return [
			'IP'				=> LiteSetup::createString(),
			'City'				=> LiteSetup::createString(null),
			'Region'			=> LiteSetup::createString(null),
			'RegionCode'		=> LiteSetup::createString(null),
			'CountryName'		=> LiteSetup::createString(null),
			'CountryCode'		=> LiteSetup::createString(null),
			'ContinentName'		=> LiteSetup::createString(null),
			'ContinentCode'		=> LiteSetup::createString(null),
			'Latitude'			=> LiteSetup::createDouble(null),
			'Longitude'			=> LiteSetup::createDouble(null),
			'Postal'			=> LiteSetup::createString(null),
			 
			'Flag'				=> LiteSetup::createString(null),
			'EmojiFlag'			=> LiteSetup::createString(null),
			'EmojiUnicode'		=> LiteSetup::createString(null),
			 
			'OriginalData'		=> LiteSetup::createArray([]),
			'OriginalResponse'	=> LiteSetup::createInstanceOf(IResponse::class),
			'RequestsCount'		=> LiteSetup::createString(0)
		];
	}
}
