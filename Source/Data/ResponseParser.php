<?php
namespace IPDataClient\Data;


use IPDataClient\Data\Parts\ASNData;

use Gazelle\IResponse;
use IPDataClient\Data\Parts\TimezoneData;
use Traitor\TStaticClass;


class ResponseParser
{
	use TStaticClass;
	
	
	private static function getASN(array $data): ?ASNData
	{
		$data = array_filter($data);
		
		if (!$data)
			return null;
		
		$asnData = new ASNData();
		
		$asnData->ID		= $data['asn'] ?? null;
		$asnData->Name		= $data['name'] ?? null;
		$asnData->Domain	= $data['domain'] ?? null;
		$asnData->Route		= $data['route'] ?? null;
		$asnData->Type		= $data['type'] ?? null;
		
		return $asnData;
	}
	
	private static function getTimezone(array $data): ?TimezoneData
	{
		$data = array_filter($data);
		
		if (!$data)
			return null;
		
		$timezone = new TimezoneData();
		
		$timezone->Name					= $data['name'] ?? null;
		$timezone->Abbreviation			= $data['abbr'] ?? null;
		$timezone->Offset				= $data['offset'] ?? null;
		$timezone->IsDaylightSavingTime	= (bool)($data['is_dst'] ?? null);
		$timezone->CurrentTime			= $data['current_time'] ?? null;
		
		return $timezone;
	}
	
	
	public static function parse(IResponse $rawResponse): IPDataResponse
	{
		$data = $rawResponse->getJSON();
		
		$response = new IPDataResponse();
		
		$response->OriginalData		= $data;
		$response->OriginalResponse	= $rawResponse;
		$response->RequestsCount	= $data['count'];
		
		$response->City				= $data['city'];
		$response->Region			= $data['region'];
		$response->RegionCode		= $data['region_code'];
		$response->CountryName		= $data['country_name'];
		$response->CountryCode		= $data['country_code'];
		$response->ContinentName	= $data['continent_name'];
		$response->ContinentCode	= $data['continent_code'];
		$response->Latitude			= $data['latitude'];
		$response->Longitude		= $data['longitude'];
		$response->Postal			= $data['postal'];
		$response->Flag				= $data['flag'];
		$response->EmojiFlag		= $data['emoji_flag'];
		$response->EmojiUnicode		= $data['emoji_unicode'];
		
		
		$response->ASN		= self::getASN($data['asn'] ?? []);
		$response->Timezone	= self::getTimezone($data['time_zone'] ?? []);
		
		
		return $response;
	}
}