<?php
namespace IPDataClient\Data;


use Gazelle\IResponse;
use Structura\Strings;
use IPDataClient\Data\Parts\ASNData;
use IPDataClient\Data\Parts\TimezoneData;

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
 * @property ASNData|null		$ASN
 * @property TimezoneData|null	$Timezone
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
			 
			'ASN'				=> LiteSetup::createInstanceOf(ASNData::class),
			'Timezone'			=> LiteSetup::createInstanceOf(TimezoneData::class),
			
			'OriginalData'		=> LiteSetup::createArray([]),
			'OriginalResponse'	=> LiteSetup::createInstanceOf(IResponse::class),
			'RequestsCount'		=> LiteSetup::createString(0)
		];
	}
	
	
	public function getMaskedIP(int $sectionsToMask = 2): ?string
	{
		$ip = $this->IP;
		$delimiter = '.';
		
		if (Strings::contains($ip, ':'))
		{
			$delimiter = ':';
		}
		
		$ip = explode($delimiter, $ip);
		
		for ($i = 1; $i <= min($sectionsToMask, count($ip)); $i++)
		{
			$ip[count($ip) - $i] = '*';
		}
		
		return implode($delimiter, $ip);
	}
}
